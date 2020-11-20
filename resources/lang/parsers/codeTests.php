<?php
require_once('parserlib/simple_html_dom.php');

$page = file_get_html('https://kinogo.by/3508-besslavnye-ublyudki-2009-smotret-onlayn.html');

$description = $page->find('.fullimg div')[0]->plaintext;
foreach ($description as $description)
{
    echo $description;
}
