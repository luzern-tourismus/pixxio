<?php

require "config.php";


$reader = new \LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader();
$reader->subdomain = '';
$reader->apiKey = '';

foreach ($reader->getData() as $metadata) {

    (new \Nemundo\Core\Debug\Debug())->write($metadata->name);

}
