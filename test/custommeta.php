<?php

use LuzernTourismus\Pixxio\Builder\CustomMetadataBuilder;

require "config.php";


$config = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$config->apiKey = '';
$config->url = '';

$builder = new CustomMetadataBuilder();
$builder->fromMediaspaceConfig($config);
$builder->addOption('')->addOption('');
$builder->upddate(0);
