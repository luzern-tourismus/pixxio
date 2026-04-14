<?php

use LuzernTourismus\Pixxio\Json\File\FileJsonDelete;

require "config.php";

$mediaspace = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$mediaspace->subdomain = '';
$mediaspace->apiKey = '';


$reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
$reader->fromMediaspaceConfig($mediaspace);
foreach ($reader->getData() as $file) {

    (new \Nemundo\Core\Debug\Debug())->write($file->filename);

    $delete = new FileJsonDelete();
    $delete->fromMediaspaceConfig($mediaspace);
    $delete->deleteFile($file->id);

}

