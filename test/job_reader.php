<?php

require "config.php";

$jobId = 0;

$reader = new \LuzernTourismus\Pixxio\Json\Job\JobJsonReader();
$reader->subdomain = '';
$reader->apiKey = '';
$reader->getJob($jobId);
