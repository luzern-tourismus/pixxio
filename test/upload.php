<?php

require "config.php";

//$filename = 'C:\test\image\photo-1495745966610-2a67f2297e5e.avif';

$filename='C:\test\image\file_example_JPG_1MB.jpg';
(new \LuzernTourismus\Pixxio\Json\FileUpload())->upload($filename);


//(new \OpenLuv\App\Pixxio\WebRequest\PixxioWebRequest())->uploadFile($filename);
