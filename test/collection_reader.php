<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReaderJson())->getData() as $file) {

    (new \Nemundo\Core\Debug\Debug())->write($file);

}
