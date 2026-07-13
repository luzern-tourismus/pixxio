<?php

namespace LuzernTourismus\PixxioTest\Json\Collection;

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
        $reader->page = 100;
        $reader->pageSize = 50;
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        foreach ($reader->getData() as $file) {
            (new Debug())->write($file);
        }

    }

}