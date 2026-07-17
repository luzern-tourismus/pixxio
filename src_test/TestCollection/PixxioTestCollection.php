<?php

namespace LuzernTourismus\PixxioTest\TestCollection;

use LuzernTourismus\PixxioTest\Builder\MetadataBuilderTest;
use LuzernTourismus\PixxioTest\Core\AbstractTestCollection;
use LuzernTourismus\PixxioTest\Import\UserImportTest;
use LuzernTourismus\PixxioTest\Json\Collection\CollectionBuilderTest;
use LuzernTourismus\PixxioTest\Json\Collection\CollectionImportTest;
use LuzernTourismus\PixxioTest\Json\Collection\CollectionJsonDeleteTest;
use LuzernTourismus\PixxioTest\Json\Collection\CollectionJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\File\FileJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\File\FileUploadTest;
use LuzernTourismus\PixxioTest\Json\JobReaderTest;
use LuzernTourismus\PixxioTest\Json\MetadataReaderTest;
use LuzernTourismus\PixxioTest\Json\UserJsonReaderTest;

class PixxioTestCollection extends AbstractTestCollection
{


    protected function loadCollection()
    {


        $this
            ->addTest(new JobReaderTest())
            ->addTest(new UserJsonReaderTest())
            ->addTest(new UserImportTest())
            ->addTest(new FileUploadTest())
            ->addTest(new FileJsonReaderTest())
            ->addTest(new CollectionBuilderTest())
            ->addTest(new JobReaderTest())
            ->addTest(new MetadataReaderTest())
            ->addTest(new CollectionJsonReaderTest())
            ->addTest(new CollectionJsonDeleteTest())
            ->addTest(new CollectionImportTest())
            ->addTest(new MetadataBuilderTest());


    }


}