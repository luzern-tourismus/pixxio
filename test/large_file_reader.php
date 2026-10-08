<?php

require "config.php";

$subdomain = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$api = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');


$reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
$reader->subdomain = $subdomain;
$reader->apiKey = $api;
$reader->pageSize=2;

do {

    foreach ($reader->getData() as $file) {
        (new \Nemundo\Core\Debug\Debug())->write($file);
    }

    (new \Nemundo\Core\Debug\Debug())->write($reader->hasCursor());

} while ($reader->hasCursor());


