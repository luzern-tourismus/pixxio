<?php

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use LuzernTourismus\Pixxio\Builder\CustomMetadataBuilder;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Json\FileUpload;
use LuzernTourismus\Pixxio\Setup\MediaspaceSetup;

require "config.php";


$config = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$config->apiKey = '';
$config->subdomain = '';

$builder = new CustomMetadataBuilder();
$builder->fromMediaspaceConfig($config);
$builder->addOption('')->addOption('');
$builder->upddate(0);
