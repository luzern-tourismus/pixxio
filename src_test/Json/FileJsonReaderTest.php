<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Test\AbstractTest;

class FileJsonReaderTest extends AbstractPixxioTest
{

    public function runTest()
    {

        $reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
        $reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $reader->pageSize = 10;

        foreach ($reader->getData() as $file) {
            (new \Nemundo\Core\Debug\Debug())->write($file);
        }

    }

}