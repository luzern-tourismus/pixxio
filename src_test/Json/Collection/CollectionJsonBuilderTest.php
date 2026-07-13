<?php

namespace LuzernTourismus\PixxioTest\Json\Collection;

use LuzernTourismus\Pixxio\Builder\CollectionBuilder;
use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonDelete;
use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class CollectionJsonBuilderTest extends AbstractPixxioTest
{


    protected function loadTest()
    {

        $this->testName = 'collection-json-builder';

    }


    public function runTest()
    {


        $builder = new CollectionBuilder();
        $builder->fromMediaspaceConfig(new MediaspaceConfigTest());
        $builder->collection = 'Test Collection';
        $builder->build();



    }

}