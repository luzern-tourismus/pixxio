<?php

require "config.php";

$filename = '';

$upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
$upload->fullFilename = $filename;
$upload->title = '';
$upload->directoryId = 0;
$upload->addKeyword('');
$upload->addMetadata(628208860, 'Copyright by xy');
//$upload->addMetadata(1968059366, 26897557);
$upload->description = '';
$upload->upload();
