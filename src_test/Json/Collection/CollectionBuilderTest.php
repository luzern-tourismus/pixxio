<?php

namespace LuzernTourismus\PixxioTest\Json\Collection;

use LuzernTourismus\Pixxio\Builder\CollectionBuilder;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Structure\ForLoop;

class CollectionBuilderTest extends AbstractPixxioTest
{

    protected function loadTest()
    {
        $this->testName = 'collection-builder';
    }


    public function runTest()
    {

        //(new Debug())->write('Test');

        $loop = new ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 40;
        foreach ($loop->getData() as $number) {

            $builder = new CollectionBuilder();
            $builder->fromMediaspaceConfig(new MediaspaceConfigTest());
            $builder->collection = 'Test Collection ' . $number;    // $this->getValue('test_collection');
            $builder->build();
        }


        /*$builder
            ->addFile(2135561740)
            ->addFile(1238021428);*/

        //$builder->build();

    }

}