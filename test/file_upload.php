<?php

require "config.php";

$filename = '';

$upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
$upload->fullFilename = $filename;
$upload->title = '';
$upload->directoryId = 0;
$upload->addKeyword('');
$upload->addMetadata(75540013, 'hier ein beschreibungstext');
$upload->addMetadata(1968059366, 26897557);
$upload->description = '';
$upload->upload();
