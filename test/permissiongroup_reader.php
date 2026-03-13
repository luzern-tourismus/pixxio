<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Json\PermissionGroup\PermissionGroupReaderJson())->getData() as $permissionGroup) {
    (new \Nemundo\Core\Debug\Debug())->write($permissionGroup);
}
