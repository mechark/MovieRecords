<?php

namespace App\Http\Controllers\Parsers;
//require_once('../../../../vendor/autoload.php');
require_once('parserlib/simple_html_dom.php');
use App\Models\Movie;
use PHPHtmlParser\Dom;
use \PHPHtmlParser\Options;
use Illuminate\Database\Eloquent;
session_start();
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

        /*  for ($i = 0; $i <= 5; $i++)
 {
       echo 'Downloading started';
              $urlOfMovie = $quality[$i];
              $pathToSave = '';
              $fp = fopen($pathToSave, 'w+');

              $curl = curl_init($urlOfMovie);

              curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
              curl_setopt($curl, CURLOPT_FILE, $fp);


              curl_exec($curl);

              $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
              curl_close($curl);
              fclose($fp);

              if ($statusCode == 200)
              {
                 echo 'Downloaded';
              }*/

    }

    public function addData(
        $name, $description, $genre,
        $country, $year, $director,
        $kinopoiskRating, $cover, $url,
        $actors, $IMDBRating, $budget,
        $fees, $src
    )
    {
        $movie = new Movie;
        $movie->url = $url;
        $movie->cover = $cover;
        $movie->src = $src;
        $movie->name = $name;
        $movie->genre = $genre;
        $movie->country = $country;
        $movie->year = $year;
        $movie->director = $director;
        $movie->IMDB = $IMDBRating;
        $movie->Kinopoisk = $kinopoiskRating;
        $movie->budget = $budget;
        $movie->fees = $fees;
        $movie->actors = $actors;
        $movie->description = $description;
        $movie->save();
    }

    public function getInfo()
    {
        $moviePages = $this->getHtml('https://kinogo.la/');
        $dom = new Dom;

        // Переадресация с киного на кинопоиск для получения сраницы с каждым фильмом
//        for ($i = 0; $i <= count($moviePages); $i++) {


//        foreach ($moviePages as $movieUrl) {

            // Парсер с curl
//                session_start();
            $page = file_get_html('https://kinogo.la/26254-greyhound_2020.html');
            $quality = [];
            array_push($quality, $page->find('h1')[0]->plaintext);
            $nameOfTheMovie = explode(" ", $quality[0]);
            $yearOfTheMovie = $page->find('.quote a')[0]->plaintext;
            $kinogoSearch = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2];
            $dom->setOptions(
                (new Options())->setRemoveScripts(false)
            );
            $dom->loadFromUrl($kinogoSearch);
            $kinogoName = 'https://www.kinopoisk.ru/' . $dom->find('.name a')[0]->href;
            $dom->loadFromUrl($kinogoSearch);
            if ($yearOfTheMovie == $dom->find('.year')->text) {


                $headers = [
                    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
                    'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
                    'cache-control: max-age=0',
                    'Connection: keep-alive',
                    "upgrade-insecure-requests: 1",
                    "accept-encoding: gzip, deflate, br",
                    "sec-ch-ua: Google Chrome;v=87, \Not;A\\Brand;v=99, Chromium;v=87",
                    "sec-fetch-dest: document",
                    "sec-fetch-mode: navigate",
                    "sec-fetch-site: same-origin",
                    "cookie: _csrf=DgrjrOmVFSMKs2-CYyjv08ZO; i=fRQ27KWzRsLLBMCws3b4lAFr2wIeRugrPPUxPNnARzN7JzF8gaqXg9D+zKF/lwW1v/3CtMpHm9FIvoV2NW9ohSFtFQI=; PHPSESSID=0a1d5i4ujlckp3knmmetdhud65; user_country=ot; yandex_gid=10393; tc=1; __kp_bmsngr=r; desktop_session_key=aa0e9ea14d74ad0a1c2f25db38b8458052c103beff9a277d7ecef685c45f5aa2c787bfe70e6ca52af707a7f37d0796250d75335c250b2173b99da8f1a4cbd62a1c617ff6242dc2f25b84fcd17b0fb764e40d7520891c6ae4280a5c2890f861cb; desktop_session_key.sig=QRu5GXDqS9mdVDXlhjxtxJ4u4Uw; ya_sess_id=noauth:1608644623; ys=c_chck.2818506094; yandexuid=1677058161608644452; mda2_beacon=1608644623502; sso_status=sso.passport.yandex.ru:synchronized_no_beacon; mobile=no; kpunk=1; location=1",

                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_URL, $kinogoName);
                curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies/cookie.txt');
                curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookies/cookie.txt');
                curl_setopt($ch, CURLOPT_COOKIESESSION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; rv:85.0) Gecko/20100101 Firefox/85.0');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_REFERER, 'https://www.rambler.ru/');
                curl_setopt($ch, CURLINFO_HEADER_OUT, true);
                curl_setopt($ch, CURLOPT_HEADEROPT, true);

                $exec = curl_exec($ch);

                print_r(curl_getinfo($ch, CURLINFO_HEADER_OUT));
                $page1 = gzdecode($exec);


                // Распарсинг
                $dom->loadStr($page1);
                $jsonPage = $dom->find('script')[4]->text;
                $page = json_decode($jsonPage);
                // Информация для БД
                $name = $page->name;
                $description = $page->description;
                $genre = implode(", ", $page->genre);
                $country = implode(", ", $page->countryOfOrigin);
                $year = $page->datePublished;
                $director = $page->director[0]->name;
                $kinopoiskRating = round($page->aggregateRating->ratingValue, 1);
                $cover = $page->image;
                $url = implode("-", explode(" ", strtolower($page->alternativeHeadline)));
                $actors = [];
                foreach ($page->actor as $actor) {
                    array_push($actors, $actor->name);
                }
                $actors = implode(", ", $actors);
                $IMDBRating = round($dom->find('.styles_value__3qmcr a')->text, 1);
                if (empty($dom->find('[data-tid=a189db02] a')[1]->text)) {
                    $budget = " ";
                    $fees = " ";
                } else {
                    $budget = implode(" ", explode("&nbsp;", $dom->find('[data-tid=a189db02] a')[1]->text));
                    $fees = implode(" ", explode("&nbsp;", $dom->find('[data-tid=712ca0f8] a')->text));
                }

//                $src = $this->parserMovie('https://kinogo.la/7171-pulp-fiction_1994.html')[3];
                $src = "https://cdn1.kinogo.la/movies/afbdb6d73d7eb496d01d4907383e8579c96ed519/ae455b29c5f8c27eafe3b703b681d5ba:2020122318/720.mp4";
                //print_r($src);
                curl_close($ch);
//                print_r($description);
                $this->addData(
                    $name, $description, $genre,
                    $country, $year, $director,
                    $kinopoiskRating, $cover, $url,
                    $actors, $IMDBRating, $budget,
                    $fees, $src
                );
                echo $name . " успешно добавлен";
                // sleep(6);
//        }
            }
            else {
                echo "Найден не тот фильм";
            }

        }


//    }


    //}
}
