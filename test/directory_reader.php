<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Reader\DirecotryReader())->getData() as $file) {

    (new \Nemundo\Core\Debug\Debug())->write($file);

}
