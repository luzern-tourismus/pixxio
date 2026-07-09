<?php

namespace LuzernTourismus\PixxioTest\Import;

use LuzernTourismus\Pixxio\Import\UserImport;
use LuzernTourismus\Pixxio\Json\User\UserJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;

class UserImportTest extends AbstractPixxioTest
{

    protected function loadTest()
    {

        $this->testName = 'user-import';

    }

    public function runTest() {

        (new UserImport())->importData();

    }

}