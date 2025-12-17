<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Reader\CustomMetadataReader())->getData() as $metadata) {

    (new \Nemundo\Core\Debug\Debug())->write($metadata);

}
