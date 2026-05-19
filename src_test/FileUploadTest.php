<?php

namespace LuzernTourismus\PixxioTest;

use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class FileUploadTest extends AbstractTest
{

    public function runTest()
    {

        $filename = $this->getValue('test_filename');

        $upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
        $upload->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $upload->fullFilename = $filename;
        $upload->title = 'Test';
        $upload->directoryId = $this->getValue('test_directory_id');
        //$upload->addKeyword('');
        //$upload->addMetadata(628208860, 'Copyright by xy');
//$upload->addMetadata(1968059366, 26897557);
        //$upload->description = '';
        $jobId = $upload->upload();

        (new Debug())->write($jobId);


    }


}