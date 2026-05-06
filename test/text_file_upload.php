<?php

require "config.php";



/*$mediaspace = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$mediaspace->subdomain = $mediaspace;
$mediaspace->apiKey = $api '';*/

$filename ='C:\test\test.png';  // 'C:\test\webp.webp';
$directoryId = 1900732808;

$upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
$upload->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
$upload->fullFilename = $filename;
$upload->title = 'Test';
$upload->directoryId = $directoryId;
$upload->addKeyword('');
$upload->addMetadata(628208860, 'Copyright by xy');
//$upload->addMetadata(1968059366, 26897557);
$upload->description = '';
$jobId = $upload->upload();

(new \Nemundo\Core\Debug\Debug())->write($jobId);

$reader = new \LuzernTourismus\Pixxio\Json\Job\JobJsonReader();
$reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
$reader->getJob($jobId);
