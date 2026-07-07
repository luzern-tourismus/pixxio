<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class FileJsonReaderTest extends AbstractPixxioTest
{

    protected function loadTest()
    {
        $this->testName = 'file-json-read';
    }


    public function runTest()
    {

        $reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
        $reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        //$reader->filterByCollectionId = 1866091533;
        $reader->pageSize = 1;  // 500;

        $n = 0;

        foreach ($reader->getData() as $file) {

            (new FileImport())->importFile($file,1);

            (new \Nemundo\Core\Debug\Debug())->write($file->fileName);
            (new \Nemundo\Core\Debug\Debug())->write($file);
            $n++;
        }

        (new Debug())->write('Count: ' . $n);

    }

}