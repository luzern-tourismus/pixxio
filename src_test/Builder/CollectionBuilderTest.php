<?php

namespace LuzernTourismus\PixxioTest\Builder;

use LuzernTourismus\Pixxio\Builder\CollectionBuilder;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;

class CollectionBuilderTest extends AbstractPixxioTest
{

    protected function loadTest()
    {
        $this->testName = 'collection-builder';
    }


    public function runTest()
    {

        $builder = new CollectionBuilder();
        $builder->fromMediaspaceConfig(new MediaspaceConfigTest());
        $builder->collection = $this->getValue('test_collection');

        $builder
            ->addFile(2135561740)
            ->addFile(1238021428);

        $builder->build();

    }

}