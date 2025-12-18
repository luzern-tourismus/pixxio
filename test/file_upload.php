<?php

require "config.php";

$filename = 'C:\Users\urs.lang\Downloads\Mars_Perseverance_NLG_1711_0818842024_992ECM_N0830000NCAM00500_00_2I4J.png';

$upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
$upload->fullFilename = $filename;
$upload->title = 'Mars';
$upload->addKeyword('LTAG')->addKeyword('Mars');
$upload->addMetadata(75540013,'hier ein beschreibungstext');  //->addMetadata(1968059366,'Nidwalden Tourismus');
$upload->addMetadata(1968059366,26897557);
$upload->description= 'NASAs Mars Perseverance rover acquired this image using its onboard Left Navigation Camera (Navcam). The camera is located high on the rovers mast and aids in driving.';
$upload->upload();


//(new \OpenLuv\App\Pixxio\WebRequest\PixxioWebRequest())->uploadFile($filename);

/* [id] => 75540013
    [name] => Beschreibung2
)

Array
(
    [id] => 1968059366
    [name] => Tourismusorganisation*/
