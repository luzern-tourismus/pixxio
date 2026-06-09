<?php

namespace LuzernTourismus\PixxioTest\Reader;

use LuzernTourismus\Pixxio\Json\Directory\DirecotryJsonReader;
use LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class DirecctoryReaderTest extends AbstractTest
{

    public function runTest()
    {

        $reader = new DirectoryDataReader();
        foreach ($reader->getData() as $file) {

            (new \Nemundo\Core\Debug\Debug())->write($file->directory);

            foreach ($file->getParentDirectoryList() as $directoryRow2)
            {
                (new Debug())->write(' - '.$directoryRow2->directory);
            }

            //exit;

        }

    }

}