<?php

require "config.php";

$reader = new \LuzernTourismus\Pixxio\Reader\File\FileDataReader();
foreach ($reader->getData() as $fileRow) {

    (new \Nemundo\Core\Debug\Debug())->write($fileRow->directory->getParentDirectoryList());

}


//(new \LuzernTourismus\PixxioTest\JobReaderTest())->runTest();
//(new \LuzernTourismus\PixxioTest\TextFileUploadTest())->runTest();

//(new \LuzernTourismus\Pixxio\Setup\MediaspaceSetup())->addMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());

//(new \LuzernTourismus\PixxioTest\FileUploadTest())->runTest();

//(new \LuzernTourismus\PixxioTest\FileUploadTest())->runTest();
