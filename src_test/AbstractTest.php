<?php

namespace LuzernTourismus\PixxioTest;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\Config\ProjectConfigReader;

abstract class AbstractTest extends AbstractBase
{


    abstract public function runTest();

    protected function getValue($key)
    {

        $value = (new ProjectConfigReader())->getValue($key);
        return $value;

    }

}