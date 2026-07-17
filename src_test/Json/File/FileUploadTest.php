<?php

namespace LuzernTourismus\PixxioTest\Json\File;

use LuzernTourismus\Pixxio\Json\File\FileUpload;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\System\Delay;

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


        $upload
            ->addCustomMetadata(628208860,'by ltag')
            ->addStandardMetadata(937651234,'irgendeine beschreibung');



        $jobId = $upload->upload();

        //exit;

        (new Debug())->write('Job Id: '. $jobId);

        $fileId = null;
        do {

            (new Delay())->delay(2);

            $reader = new JobJsonReader();
            $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
            $item = $reader->getJob($jobId);

            $fileId = $item->fileId;

            //(new Debug())->write($item);



        } while (!$item->jobFinished);


        (new Debug())->write('File Id: '. $fileId);

        /*(new Debug())->write($item);
        (new Debug())->write($item->fileId);*/



    }

}