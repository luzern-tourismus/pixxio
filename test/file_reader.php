<?php

require "config.php";

do {

    $reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
    $reader->subdomain = '';
    $reader->apiKey = '';
    foreach ($reader->getData() as $file) {
        //(new \Nemundo\Core\Debug\Debug())->write($file);
    }

    (new \Nemundo\Core\Debug\Debug())->write($reader->hasCursor());

} while ($reader->hasCursor());


