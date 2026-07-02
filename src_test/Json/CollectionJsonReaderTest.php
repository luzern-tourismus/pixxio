<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;

class CollectionJsonReaderTest extends AbstractPixxioTest
{

    public function runTest()
    {

        $reader = new CollectionJson

        foreach ((new \LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReader())->getData() as $file) {

            (new \Nemundo\Core\Debug\Debug())->write($file);

        }

    }

}