<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Import\JobImport;
use LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class MetadataReaderTest extends AbstractPixxioTest
{


    protected function loadTest()
    {
        $this->testName = 'metadata';
    }



    public function runTest()
    {

        $reader = new CustomMetadataJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        foreach ($reader->getData() as $item) {

            (new Debug())->write($item);

        }


    }

}