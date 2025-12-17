<?php

use LuzernTourismus\Pixxio\Json\User\UserBuilder;

require "config.php";

$builder = new \LuzernTourismus\Pixxio\Builder\CollectionBuilder();
$builder->collection = 'Test1';
$builder->build();


