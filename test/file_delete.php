<?php

use LuzernTourismus\Pixxio\Json\File\FileDelete;

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson())->getData() as $file) {

    (new \Nemundo\Core\Debug\Debug())->write($file);

    (new FileDelete())->deleteFile($file->id);

}

