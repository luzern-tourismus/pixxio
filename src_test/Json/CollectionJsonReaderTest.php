<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class CollectionJsonReaderTest extends AbstractPixxioTest
{


    protected function loadTest()
    {

        $this->testName = 'collection-json-reader';

    }


    public function runTest()
    {

        $reader = new CollectionJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        foreach ($reader->getData() as $file) {
            (new Debug())->write($file);
        }

    }

}