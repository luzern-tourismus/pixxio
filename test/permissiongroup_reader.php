<?php

require "config.php";

foreach ((new \LuzernTourismus\Pixxio\Reader\PermissionGroupReader())->getData() as $permissionGroup) {

    (new \Nemundo\Core\Debug\Debug())->write($permissionGroup);

}
