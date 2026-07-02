<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\File\FileJson;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class FileJsonTest extends AbstractTest
{

    public function runTest()
    {

        $fileId = $this->getValue('test_file_id');

        $fileJson = new FileJson();
        $fileJson->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $fileItem = $fileJson->getFile($fileId);

        (new Debug())->write($fileItem);

    }

}