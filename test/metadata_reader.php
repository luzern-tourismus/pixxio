<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Json\CustomMetadataReader())->getData() as $metadata) {

    (new \Nemundo\Core\Debug\Debug())->write($metadata);

}
