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
                $dom = new Dom;
                $dom->loadFromUrl($kinogoSearch);
                $kinogoName = 'https://www.kinopoisk.ru/' . $dom->find('.name a')[0]->href;
                $ch = curl_init($kinogoName);
                $headers = [
                    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                    'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
                    'cache-control: max-age=0',
                    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',

                ];
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_REFERER, 'https://www.rambler.ru/');
                curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies/cookie_'.$_SESSION['USER_ID'].'.txt');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                curl_setopt($ch, CURLOPT_HEADEROPT, true);

                $exec = curl_exec($ch);


                print_r(curl_getinfo($ch,CURLINFO_HEADER_OUT));
                print_r($exec);
                curl_close($ch);

                sleep(rand(4,10));

            }


//        }




    }

}

$parser = new Parser;
$parser->getInfo();
