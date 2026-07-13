<?php

namespace LuzernTourismus\PixxioTest\Json\Collection;

use LuzernTourismus\Pixxio\Import\CollectionImport;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;

class CollectionImportTest extends AbstractPixxioTest
{

    protected function loadTest()
    {

        $this->testName = 'collection-import';

    }

    public function runTest() {

        (new CollectionImport())->importData();

    }

}