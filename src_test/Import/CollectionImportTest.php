<?php

namespace LuzernTourismus\PixxioTest\Import;

use LuzernTourismus\Pixxio\Import\UserImport;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;

class CollectionImportTest extends AbstractPixxioTest
{

    protected function loadTest()
    {

        $this->testName = 'user-import';

    }

    public function runTest() {

        (new UserImport())->importData();

    }

}