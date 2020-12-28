<?php
require_once('../../../../vendor/autoload.php');
require_once('parserlib/simple_html_dom.php');
use PHPHtmlParser\Dom;
use \PHPHtmlParser\Options;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
ini_set('memory_limit', '-1');
//---------------------------------------------------------
/*ini_set('memory_limit', '-1');

$page = file_get_html('https://kinogo.by/');

// Получаю ссылки на страницу сайта с фильмом
$uris = $page->find('.zagolovki a');
$urls = array_map(function ($url)
{
    return $url->href;
},$uris);

// Нахожу фильм во всех качествах
function parserMovie($url)
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

    // Собираю всю информацию о фильме
    $title = array_push($quality, $page->find('h1')[0]->plaintext);
    $nameOfTheMovie = explode(" ", $quality[5]);


    $kinogoInformation = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2] . "+" .$nameOfTheMovie[3];

    $kinogoPage = file_get_html($kinogoInformation);
    $kinogoName = 'https://www.kinopoisk.ru' .  $kinogoPage->find('.name a')[0]->href;
    $ch = curl_init('https://www.kinopoisk.ru/film/1055194/');
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADEROPT, true);
    $exec = curl_exec($ch);
    $html = file_get_html($exec);

    //////    for ($i = 0; $i < 6; $i++)
//////    {
// echo 'Downloading started';
//        $urlOfMovie = $quality[3];
//        $pathToSave = 'basterds.mp4';
//
//        $fp = fopen($pathToSave, 'w+');
//
//        $ch = curl_init($urlOfMovie);
//
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//        curl_setopt($ch, CURLOPT_FILE, $fp);
//
//
//        curl_exec($ch);
//
//        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//        curl_close($ch);
//        fclose($fp);
//
//        if ($statusCode == 200)
//        {
//            echo 'Downloaded';
//        }

//        return $exec;

//    }


//
//////    for ($i = 0; $i < 6; $i++)
//////    {
// echo 'Downloading started';
//        $urlOfMovie = $quality[3];
//        $pathToSave = 'basterds.mp4';
//
//        $fp = fopen($pathToSave, 'w+');
//
//        $ch = curl_init($urlOfMovie);
//
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//        curl_setopt($ch, CURLOPT_FILE, $fp);
//
//
//        curl_exec($ch);
//
//        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//        curl_close($ch);
//        fclose($fp);
//
//        if ($statusCode == 200)
//        {
//            echo 'Downloaded';
//        }

//        return $exec;

//    }


///fsdfsdfsdfsdf

}
*/

//class InfoParser {
//
//    public function parseCode($page)
//    {
//        $dom = new Dom;
//        $dom->loadFromUrl($page);
//        return $dom;
//    }
//
//}
//
//
//

//
//\Illuminate\Support\Facades\DB::table('movies')::upsert([
//    [
//        ''=>'',''=>'',''=>'','year'=>$aResult[0],'director'=>$aResult[4],''=>'',''=>'','budget'=>$aResult[11],
//        'fees'=>'',''
//    ]
//]);

//
//$page = file_get_html('https://kinogo.la');
//
//// Получаю ссылки на страницу сайта с фильмом
//$uris = $page->find('.zagolovki a');
//$urls = array_map(function ($url)
//{
//    return $url->href;
//},$uris);
//foreach ($urls as $uri)
//{
//    echo $uri;
//}

// Парсер с curl
//session_start();
//$page = file_get_html('https://kinogo.la/29159-fatman_2020____22-20.html');
//$quality = [];
//array_push($quality, $page->find('h1')[0]->plaintext);
//$nameOfTheMovie = explode(" ", $quality[0]);
//$kinogoSearch = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2];
//$dom = new Dom;
//$dom->setOptions(
//    (new Options())->setRemoveScripts(false)
//);
//$dom->loadFromUrl($kinogoSearch);
//$kinogoName = 'https://www.kinopoisk.ru/' . $dom->find('.name a')[0]->href;
//
//
//$headers = [
//    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
//    'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
//    'cache-control: max-age=0',
//    'Connection: keep-alive',
//    "upgrade-insecure-requests: 1",
//    "accept-encoding: gzip, deflate, br",
//    "sec-ch-ua: Google Chrome;v=87, \Not;A\\Brand;v=99, Chromium;v=87",
//    "sec-fetch-dest: document",
//    "sec-fetch-mode: navigate",
//    "sec-fetch-site: same-origin",
//    "cookie: _csrf=DgrjrOmVFSMKs2-CYyjv08ZO; i=fRQ27KWzRsLLBMCws3b4lAFr2wIeRugrPPUxPNnARzN7JzF8gaqXg9D+zKF/lwW1v/3CtMpHm9FIvoV2NW9ohSFtFQI=; PHPSESSID=0a1d5i4ujlckp3knmmetdhud65; user_country=ot; yandex_gid=10393; tc=1; __kp_bmsngr=r; desktop_session_key=aa0e9ea14d74ad0a1c2f25db38b8458052c103beff9a277d7ecef685c45f5aa2c787bfe70e6ca52af707a7f37d0796250d75335c250b2173b99da8f1a4cbd62a1c617ff6242dc2f25b84fcd17b0fb764e40d7520891c6ae4280a5c2890f861cb; desktop_session_key.sig=QRu5GXDqS9mdVDXlhjxtxJ4u4Uw; ya_sess_id=noauth:1608644623; ys=c_chck.2818506094; yandexuid=1677058161608644452; mda2_beacon=1608644623502; sso_status=sso.passport.yandex.ru:synchronized_no_beacon; mobile=no; kpunk=1; location=1",
//
//];
//$ch = curl_init();
//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//curl_setopt($ch, CURLOPT_URL, $kinogoName);
//curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookies/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIEFILE,'cookies/cookie.txt');
//curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; rv:85.0) Gecko/20100101 Firefox/85.0');
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch, CURLOPT_REFERER, 'https://www.rambler.ru/');
//curl_setopt($ch, CURLINFO_HEADER_OUT, true);
//curl_setopt($ch, CURLOPT_HEADEROPT, true);
//
//$exec = curl_exec($ch);
//
//print_r(curl_getinfo($ch,CURLINFO_HEADER_OUT));
//$page1 = gzdecode($exec);
//
//
//// Распарсинг
//$dom->loadStr($page1);
//$jsonPage = $dom->find('script')[4]->text;
//$page = json_decode($jsonPage);
//// Информация для БД
//$name = $page->name;
//$description = $page->description;
//$genre = implode(", ", $page->genre);
//$country = implode(", ", $page->countryOfOrigin);
//$year = $page->datePublished;
//$director = $page->director[0]->name;
//$kinopoiskRating = round($page->aggregateRating->ratingValue,1);
//$cover = $page->image;
//$url = implode("-",explode(" ",strtolower($page->alternativeHeadline)));
//$actors = [];
//foreach ($page->actor as $actor){array_push($actors, $actor->name);}
//$actors = implode(", ", $actors);
//$IMDBRating = round($dom->find('.styles_value__3qmcr a')->text,1);
//$budget = implode(" ",explode("&nbsp;",$dom->find('[data-tid=a189db02] a')[1]->text));
//$fees = implode(" ",explode("&nbsp;",$dom->find('[data-tid=712ca0f8] a')->text));
//$src = 'lox';
//
//curl_close($ch);
//print_r($url);
//
//$tableRows = [
//    'url','cover','src','name','genre','country','year',
//    'director','IMDB','Kinopoisk','budget',
//    'fees','actors','description'
//];
$dom = new Dom;
$dom->loadFromUrl('https://kinogo.la/22987-1917_2019.html');
print_r(explode(" ",$dom->find('h1')[0]->text));
