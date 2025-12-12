<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Json\FileJsonReader())->getData() as $file) {

    (new \Nemundo\Core\Debug\Debug())->write($file);

    /*$request = new \OpenLuv\App\Pixxio\WebRequest\PixxioWebRequest();
    $request->deleteUrl($file->id);*/

}
