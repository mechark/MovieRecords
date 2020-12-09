<?php
require_once('../../../vendor/autoload.php');
require_once('parserlib/simple_html_dom.php');
use PHPHtmlParser\Dom;
use \PHPHtmlParser\Options;
use App\Models\Movie;
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

    $dom = new Dom;
    $dom->loadFromUrl($html);
    $URIToMovie = $dom->find('.styles_originalTitle__31aMS')->text;
    $title = $dom->find('.styles_title__2l0HH')->text;
    $year = $dom->find('.styles_linkDark__3aytH styles_link__1N3S2')->text;
    $country = $dom->find('.styles_linkDark__3aytH styles_link__1N3S2')->text;
    $director = $dom->find('.styles_valueDark__3dsUz styles_value__2F1uj')->text;
    $budget = $dom->find('.styles_linkDark__3aytH styles_link__1N3S2')->text;
    $feas = $dom->find('.styles_linkDark__3aytH styles_link__1N3S2')->text;
    $countryOfTheMovie = $dom->find('.styles_valueDark__3dsUz styles_value__2F1uj')->text;


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


$page = file_get_html('https://kinogo.la/26254-greyhound_2020.html');
$quality = [];
array_push($quality, $page->find('h1')[0]->plaintext);
$nameOfTheMovie = explode(" ", $quality[0]);
$kinogoSearch = "https://www.kinopoisk.ru/index.php?kp_query=" . $nameOfTheMovie[2];
$dom = new Dom;
$dom->loadFromUrl($kinogoSearch);
$kinogoName = 'https://www.kinopoisk.ru/' . $dom->find('.name a')[0]->href;
$ch = curl_init($kinogoName);
$headers = [
    'accept:text/html',
    'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7',
    'cache-control: max-age=0',
    'sec-fetch-dest: document',
    'cookie: PHPSESSID=1iv7vnj7rtibr2j6q1f5j0h6k2; yandex_gid=10393; tc=1; my_perpages=%5B%5D; _csrf_csrf_token=_rRE_SlTBdSTm6OgCOs7fSygPEmC3bvwL3EIsVii7Ew; mobile=no; desktop_session_key=032185c06950c67f1217bf2b482ce955d90da9c87a9de8182f81f01783bd6daa937be18a70522255d25154ead4076aef509532a8eed90745839bb87c244d6a626ba0ec289839b2225f0a5c8af62f5ee198fbbb06012d7bfb59da0eb3f0a89d0c; desktop_session_key.sig=3Y_-5gXFeSkjqOEeD2aL3fZWKoY; mda_exp_enabled=1; yandexuid=4697446891607251282; crookie=AeXAMMn642LazIdYgq+F0j1UQrDtaOBq8IxFTPjRoIpMJtUm2LBPmiufaYeCs8df9sKL9jzLGH1oTR9CmNZzQqQdz/s=; cmtchd=MTYwNzI4Mjk1MzI2NQ==; __kp_bmsngr=r; user-geo-region-id=102; user-geo-country-id=2; yandex_login=forrubbishttp@gmail.com; i=chP3QzqAYJjABaGf3wS7rfvJ6S8HGEnVmcPG8kNa/WYMJIqRxiHkBoke5pClFYHDGdc/WgC3S5ormCaUPKG9c8xUOJk=; _csrf=aJZrY1Nf-VpzRukF7DrJrKxd; uid=52657567; gdpr=0; _ym_uid=1607361974460737646; mda=0; yuidss=4697446891607251282; yp=1607448375.yu.4697446891607251282; ymex=1609953975.oyu.4697446891607251282; touch_session_key=e38443ca50efec39467b60caf1709f232a5dcbfaf540713b07c5084f0f6ba3170e2d9c761ede2f5cfae8f2694bb66e42aeab19f428bef56c3f2e58fc9b4dcd2e68cf27ce00b13b7be31c080151ec386b63bb2b90332f8da062bae60450b14344; touch_session_key.sig=snPGWNIz07-VaeFgP-eHENkW1J8; ya_sess_id=3:1607457229.5.0.1607355878884:ARcAAAAAAAAAAAnPoG4CKg:cf.1|1064685736.0.2|30:194545.989329.ujkTLDgixbuP7CwqgevSGThTKAs; ys=udn.cDphcGFjaGUgcy4%3D#c_chck.3125805785; mda2_beacon=1607457229301; location=1; kpunk=1; _ym_d=1607535757',
    'sec-fetch-mode: navigate',
    'sec-fetch-site: same-origin',
    'sec-fetch-user: ?1',
    'upgrade-insecure-requests: 1',
    'user-agent: Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Mobile Safari/537.36',

];
$agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36";
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_REFERER, 'https://www.rambler.ru/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_HEADEROPT, true);

$exec = curl_exec($ch);


print_r(curl_getinfo($ch,CURLINFO_HEADER_OUT));
print_r($exec);
curl_close($ch);
