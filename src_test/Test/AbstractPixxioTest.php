<?php

namespace LuzernTourismus\PixxioTest\Test;

use Nemundo\Test\AbstractTest;

abstract class AbstractPixxioTest extends AbstractTest
{


    protected $testName;

    abstract protected function loadTest();


    public function __construct()
    {

        $this->loadTest();

    }


    public function getTestName() {
        return $this->testName;
    }




    protected function getFileId()
    {

        $fileId = $this->getValue('test_file_id');
        return $fileId;

    }

}