<?php

namespace LuzernTourismus\PixxioTest\Test;

use Nemundo\Test\AbstractTest;

abstract class AbstractPixxioTest extends AbstractTest
{

    protected function getFileId()
    {

        $fileId = $this->getValue('test_file_id');
        return $fileId;

    }


}