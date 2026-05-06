<?php

require "config.php";

$jobId = 23585884;

$reader = new \LuzernTourismus\Pixxio\Json\Job\JobJsonReader();
$reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
$reader->getJob($jobId);
