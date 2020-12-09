<?php
require_once('../../../vendor/autoload.php');
require_once('parserlib/simple_html_dom.php');
use PHPHtmlParser\Dom;
use \PHPHtmlParser\Options;
use App\Models\Movie;

class Parser
{


    public function getHtml($mainPageURI)
    {
        $page = file_get_html($mainPageURI);

        // Получаю ссылки на страницу сайта с фильмом
        $uris = $page->find('.zagolovki a');
        $urls = array_map(function ($url) {
            return $url->href;
        }, $uris);

        return $urls;
    }



    public function parserMovie($url)
    {
        $page = file_get_html($url);
        $regularExpressionOfTheMovie = '/https:\/\/cdn1.kinogo.la\/movies(\/\w+){1,}:\d+\/240.mp4/';
        preg_match($regularExpressionOfTheMovie, $page, $matches);
        $quality = [];


        // Получаю ссылки на фильм во всех качествах
        for ($i = 0; $i < 5; $i++) {
            $qualities = [
                0 => '240',
                1 => '360',
                2 => '480',
                3 => '720',
                4 => '1080',
            ];

            $quality[$i] = preg_replace('/240/', $qualities[$i], $matches[0]);
        }
        return $quality;
    }


    public function getInfo()
    {
        $moviePages = $this->getHtml('https://kinogo.la/film/premie/');
        $dom = new Dom;
        $tableRows = [
            'id','url','cover','name','genre','year','director',
            'director','IMDB','Kinopoisk','budget',
            'fees','actors','description'
        ];
        // Переадресация с киного на кинопоиск для получения сраницы с каждым фильмом
//        for ($i = 0; $i <= count($moviePages); $i++) {


            foreach ($moviePages as $movieUrl) {

                $page = file_get_html($movieUrl);
                $quality = [];
                array_push($quality, $page->find('h1')[0]->plaintext);
                $nameOfTheMovie = explode(" ", $quality[0]);
                $kinogoSearch = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2];
                $kinogoPage = file_get_html($kinogoSearch);
                $kinogoName = 'https://www.kinopoisk.ru/' . $kinogoSearch->find('.name a')[0]->href;
                $ch = curl_init($kinogoName);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADEROPT, true);
                $exec = curl_exec($ch);
                curl_close($ch);
                return $kinogoName;
                // Получение подробной информации о фильме
                $dom->loadFromUrl($exec);
                for ($j = 0; $j <= count($moviePages); $j++)
                {
                    $a = $dom->find('.styles_rowDark__2qC4I.styles_row__2ee6F')[$j]->lastChild();
                    foreach ($a->find('a') as $a)
                    {
                        $movie = new Movie;
                        $movie->$tableRows[$j] = $a;
                        $movie->save();
                    }
                }

            }


//        }




    }

}

$parser = new Parser;
$urls = $parser->getHtml('https://kinogo.la/film/premie/');

foreach ($urls as $url)
{
    $page = file_get_html($url);
    $quality = [];
    array_push($quality, $page->find('h1')[0]->plaintext);
    $nameOfTheMovie = explode(" ", $quality[0]);
    $kinogoSearch = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2];
    $dom = new Dom;
    $dom->loadFromUrl($kinogoSearch);
    $kinogoName = 'https://www.kinopoisk.ru/' . $dom->find('.name a')[0]->href;
    $ch = curl_init($kinogoName);
    $agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36";
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_REFERER, 'https://www.kinogo.ru');
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_COOKIESESSION, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_HEADEROPT, true);

    $exec = curl_exec($ch);


    print_r(curl_getinfo($ch,CURLINFO_HEADER_OUT));
    print_r($exec);
    curl_close($ch);
}
