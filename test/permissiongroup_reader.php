<?php

use LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig;

require "config.php";


$reader = new \LuzernTourismus\Pixxio\Json\PermissionGroup\PermissionGroupJsonReader();
$reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());

foreach ($reader->getData() as $permissionGroup) {
    (new \Nemundo\Core\Debug\Debug())->write($permissionGroup);
}
