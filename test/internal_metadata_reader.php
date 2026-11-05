<?php

require "config.php";



$reader = new \LuzernTourismus\Pixxio\Json\CustomMetadata\InternalMetadataJsonReader();
$reader->subdomain =(new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$reader->apiKey = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');

foreach ($reader->getData() as $metadata) {

    (new \Nemundo\Core\Debug\Debug())->write($metadata->name);

}
