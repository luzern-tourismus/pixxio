<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require __DIR__ . '/../vendor/autoload.php';

$config = new \Nemundo\Core\Config\ConfigFileReader();
$config->filename = __DIR__ . '/config.ini';

LuzernTourismus\Pixxio\Config\PixxioConfig::$mediaSpace = $config->getValue('pixxio_mediaspace');
LuzernTourismus\Pixxio\Config\PixxioConfig::$apiKey = $config->getValue('pixxio_apikey');
LuzernTourismus\Pixxio\Config\PixxioConfig::$debugMode = true;
