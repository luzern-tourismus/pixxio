<?php

namespace LuzernTourismus\PixxioTest\Json\File;

use LuzernTourismus\Pixxio\Json\File\FileUpload;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\System\Delay;

class FileModifyTest extends AbstractPixxioTest
{

    protected function loadTest()
    {
        $this->testName = 'file-modify';
    }


    public function runTest()
    {


        $fileId = $this->getValue('test_file_id');
        (new Debug())->write($fileId);
        //exit;

        $file = new \LuzernTourismus\Pixxio\Json\File\FileModify();
        $file->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
//$file->addMetadata('937651234', 'test');
//$file->addMetadata(1443405057, '3000');

        $file
            ->addKeyword('Test3')
            //->replaceCustomMetadata(1443405057,2020)
            ->modify($fileId);




    }

}