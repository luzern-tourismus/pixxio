<?php

use LuzernTourismus\Pixxio\Builder\UserBuilder;

require "config.php";

$builder = new UserBuilder();
$builder->email = '';
$builder->build();

