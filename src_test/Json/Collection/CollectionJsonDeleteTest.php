<?php

namespace LuzernTourismus\PixxioTest\Json\Collection;

use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonDelete;
use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class CollectionJsonDeleteTest extends AbstractPixxioTest
{


    protected function loadTest()
    {

        $this->testName = 'collection-json-delete';

    }


    public function runTest()
    {



        $reader = new CollectionJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        foreach ($reader->getData() as $collection) {

            (new Debug())->write($collection);

            $delete = new CollectionJsonDelete();
            $delete->fromMediaspaceConfig(new MediaspaceConfigTest());
            $delete->deleteCollection($collection->id);



        }

    }

}