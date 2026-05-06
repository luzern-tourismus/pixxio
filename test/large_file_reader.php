<?php

require "config.php";

$subdomain = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$api = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');





do {

    $reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
    $reader->subdomain = $subdomain;
    $reader->apiKey = $api;
    foreach ($reader->getData() as $file) {
        (new \Nemundo\Core\Debug\Debug())->write($file);
    }

    (new \Nemundo\Core\Debug\Debug())->write($reader->hasCursor());

} while ($reader->hasCursor());


