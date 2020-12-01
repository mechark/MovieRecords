<?php
require_once('../../../vendor/autoload.php');
require_once('parserlib/simple_html_dom.php');
use PHPHtmlParser\Dom;
use \PHPHtmlParser\Options;
use App\Models\Movie;

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
$dom = new Dom;
$dom->loadFromFile('kinopoisk.html');

$aResult = [
    0 => [],
    1 => [],
    2 => [],
    3 => [],
    4 => [],
    5 => [],
    6 => [],
    7 => [],
    8 => [],
    9 => [],
    10 => [],
    11 => [],
    12 => [],
    13 => [],
    14 => [],
    15 => [],
    16 => [],
];
for ($i = 0; $i < 13; $i++)
{
    $a = $dom->find('.styles_rowDark__2qC4I.styles_row__2ee6F')[$i]->lastChild();
    foreach ($a->find('a') as $a)
    {
        array_push($aResult[$i],$a->text);


    }
}
$movie = new Movie();
$movie->year = $aResult[0];

print_r($aResult);
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
