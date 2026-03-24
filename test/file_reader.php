<?php

require "config.php";


$reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
$reader->subdomain = '';
$reader->apiKey = '';

do {

    foreach ($reader->getData() as $file) {
        //(new \Nemundo\Core\Debug\Debug())->write($file);
    }

    (new \Nemundo\Core\Debug\Debug())->write($reader->hasCursor());

} while ($reader->hasCursor());


