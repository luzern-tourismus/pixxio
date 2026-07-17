<?php

require "config.php";



$file = new \LuzernTourismus\Pixxio\Json\File\FileModify();
$file->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
//$file->addMetadata('937651234', 'test');
//$file->addMetadata(1443405057, '3000');



$file
    ->replaceCustomMetadata(628208860,'by ltag')
    ->replaceStandardMetadata(937651234,'irgendeine beschreibung')
    ->modify(794508856);




/*
$reader = new \LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader();
$reader->subdomain = '';
$reader->apiKey = '';

foreach ($reader->getData() as $metadata) {
    (new \Nemundo\Core\Debug\Debug())->write($metadata->name);
}*/
