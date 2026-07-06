<?php

namespace LuzernTourismus\PixxioTest\Builder;

use LuzernTourismus\Pixxio\Builder\FileUpload;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class FileUploadTest extends AbstractPixxioTest
{

    protected function loadTest()
    {
        $this->testName = 'file-upload';
    }


    public function runTest()
    {

        $upload = new FileUpload();
        $upload->fromMediaspaceConfig(new MediaspaceConfigTest());
        $upload->fullFilename =  $this->getValue('test_filename');
        $upload->subject = 'Titel';
        $upload->description = $this->getValue('test_description');



        $upload->directoryId = $this->getValue('test_directory_id');

        $upload->addMultiMetadata(30246638,785365002);
        $upload->addMultiMetadata(30246638,785365002);
        $upload->addMultiMetadata(30246638,785365002);

        $jobId = $upload->upload();

        (new Debug())->write($jobId);

    }

}