<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Directory\DirecotryJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class DirecctoryJsonReaderTest extends AbstractTest
{

    public function runTest()
    {

        $reader = new DirecotryJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());

        foreach ($reader->getData() as $file) {
            (new \Nemundo\Core\Debug\Debug())->write($file);
        }

    }

}