<?php

namespace LuzernTourismus\PixxioTest\Builder;

use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;

class CollectionBuilderTest extends AbstractPixxioTest
{

    public function runTest()
    {

        $builder = new \LuzernTourismus\Pixxio\Builder\CollectionBuilder();
        $builder->collection = 'Test1';
        $builder->build();

        // TODO: Implement runTest() method.
    }

}