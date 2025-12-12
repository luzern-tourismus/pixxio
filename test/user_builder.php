<?php

use LuzernTourismus\Pixxio\Json\User\UserBuilder;

require "config.php";

$builder = new UserBuilder();
//$builder->email = 'test2@test.com';
//$builder->email = 'hans.muster@luzern.com';
$builder->email='cecile.meier@luzern.com';
$builder->build();


