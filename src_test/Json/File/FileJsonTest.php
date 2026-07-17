<?php

namespace LuzernTourismus\PixxioTest\Json\File;

use LuzernTourismus\Pixxio\Json\File\FileJson;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class FileJsonTest extends AbstractPixxioTest  // AbstractTest
{


    protected function loadTest()
    {

        $this->testName = 'file-read';

    }


    public function runTest()
    {

        $fileId = $this->getValue('test_file_id');

        $fileJson = new FileJson();
        $fileJson->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $fileItem = $fileJson->getFile($fileId);

        (new Debug())->write($fileItem);

    }

}