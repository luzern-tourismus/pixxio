<?php

require "config.php";

//(new \LuzernTourismus\PixxioTest\JobReaderTest())->runTest();
//(new \LuzernTourismus\PixxioTest\TextFileUploadTest())->runTest();

(new \LuzernTourismus\Pixxio\Setup\MediaspaceSetup())->addMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
