<?php

namespace LuzernTourismus\PixxioTest\Builder;

use LuzernTourismus\Pixxio\Builder\CustomMetadataBuilder;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Test\AbstractTest;

class MetadataBuilderTest extends AbstractTest
{

    public function runTest()
    {

        $fileId = $this->getValue('test_file_id');

        $builder = new CustomMetadataBuilder();
        $builder->fromMediaspaceConfig(new MediaspaceConfigTest());

        $builder->addOption(465210646);  //->addOption('');

        $builder->upddate($fileId);



    }

}