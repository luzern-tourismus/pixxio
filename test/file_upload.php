<?php

require "config.php";

$mediaspace = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$mediaspace->subdomain = '';
$mediaspace->apiKey = '';

$filename = '';
$directoryId = 0;

$upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
$upload->fromMediaspaceConfig($mediaspace);
$upload->fullFilename = $filename;
$upload->title = '';
$upload->directoryId = $directoryId;
$upload->addKeyword('');
$upload->addMetadata(628208860, 'Copyright by xy');
//$upload->addMetadata(1968059366, 26897557);
$upload->description = '';
$upload->upload();
