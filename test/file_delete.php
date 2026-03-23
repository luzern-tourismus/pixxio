<?php

use LuzernTourismus\Pixxio\Json\File\FileJsonDelete;

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson())->getData() as $file) {

    (new \Nemundo\Core\Debug\Debug())->write($file);




    $delete = new FileJsonDelete();

    $delete->deleteFile($file->id);

}

