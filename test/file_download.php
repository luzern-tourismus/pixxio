<?php

require "config.php";

$subdomain = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$api = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');

$id = 970512364;

$reader = new \LuzernTourismus\Pixxio\Json\Download\AssetDownload();
$reader->subdomain = $subdomain;
$reader->apiKey = $api;
$reader->getDownloadUrl($id);


//https://[EXAMPLE-MEDIASPACE].px.media/api/unstable/files/{id}





