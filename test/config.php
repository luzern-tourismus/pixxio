<?php

//error_reporting(E_ALL);
//ini_set('display_errors', '1');

require __DIR__ . '/../config.php';

$subdomain = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$api = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');
