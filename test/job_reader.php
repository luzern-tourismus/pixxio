<?php

require "config.php";


$reader = new \LuzernTourismus\Pixxio\Json\Job\JobJsonReader();
//$reader->fromMediaspaceConfig()
$reader->subdomain = 'luzern-tourismus';
$reader->apiKey = 'YDeu6vIpdktFRiCXMOLryizKzLl3fZ8MZN35TXvu4czRWc6v94l5W8W6Vp47hwtx';
$reader->getJob(22921309);
//$reader->getJob(22920570);

