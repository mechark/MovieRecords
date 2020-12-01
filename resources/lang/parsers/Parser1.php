<?php
require_once('../../../vendor/autoload.php');
require_once ('parserlib/simple_html_dom.php');
use PHPHtmlParser\Dom;
use \PHPHtmlParser\Options;
use App\Models\Movie;

class Parser
{


    public function getHtml(Parser $mainPageURI)
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

        // Переадресация с киного на кинопоиск для получения сраницы с каждым фильмом
        for ($i = 0; $i != count($this->getInfo('https://kinogo.la')); $i++) {


            foreach ($this->getHtml('https://kinogo.la')[$i] as $movieUrl) {

                $page = file_get_html($movieUrl);
                array_push($quality, $page->find('h1')[0]->plaintext);
                $nameOfTheMovie = explode(" ", $quality[5]);
                $kinogoSearch = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2] . "+" . $nameOfTheMovie[3];
                $kinogoPage = file_get_html($kinogoSearch);
                $kinogoName = 'https://www.kinopoisk.ru' . $kinogoPage->find('.name a')[0]->href;
                $ch = curl_init($kinogoName);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_HEADEROPT, true);
                $exec = curl_exec($ch);
                curl_close($ch);

            }


        }


        // Получение подробной информации о фильме
        $dom = new Dom;
        for ($i = 0; $i < 13; $i++)
        {
            $a = $dom->find('.styles_rowDark__2qC4I.styles_row__2ee6F')[$i]->lastChild();
            foreach ($a->find('a') as $a)
            {
                Movie::upsert([



                ]);
            }
        }

    }

}


