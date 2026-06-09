<?php

namespace LuzernTourismus\PixxioTest;

use LuzernTourismus\Pixxio\Json\FileUpload;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class FileUploadTest extends AbstractTest
{

    public function runTest()
    {

        $upload = new FileUpload();
        $upload->fromMediaspaceConfig(new MediaspaceConfigTest());
        $upload->fullFilename =  $this->getValue('test_filename');
        $upload->title = 'Beschreibung xy';
        $upload->directoryId = $this->getValue('test_directory_id');
        $jobId = $upload->upload();

        (new Debug())->write($jobId);

    }

}