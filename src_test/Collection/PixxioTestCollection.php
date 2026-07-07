<?php

namespace LuzernTourismus\PixxioTest\Collection;

use LuzernTourismus\PixxioTest\Builder\CollectionBuilderTest;
use LuzernTourismus\PixxioTest\Builder\FileUploadTest;
use LuzernTourismus\PixxioTest\Builder\MetadataBuilderTest;
use LuzernTourismus\PixxioTest\Core\AbstractTestCollection;
use LuzernTourismus\PixxioTest\JobReaderTest;
use LuzernTourismus\PixxioTest\Json\CollectionJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\FileJsonReaderTest;

class PixxioTestCollection extends AbstractTestCollection
{


    protected function loadCollection()
    {


        $this
            ->addTest(new JobReaderTest())
            ->addTest(new FileUploadTest())
            ->addTest(new FileJsonReaderTest())
            ->addTest(new CollectionBuilderTest())
            ->addTest(new CollectionJsonReaderTest())
            ->addTest(new MetadataBuilderTest());


    }


}