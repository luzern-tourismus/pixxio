<?php

namespace LuzernTourismus\PixxioTest\Builder;

use LuzernTourismus\Pixxio\Builder\FileUpload;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class FileUploadTest extends AbstractTest
{

    public function runTest()
    {

        $upload = new FileUpload();
        $upload->fromMediaspaceConfig(new MediaspaceConfigTest());
        $upload->fullFilename =  $this->getValue('test_filename');
        //$upload->subject = 'Beschreibung xy';
        $upload->description = 'hier etwas text ...';
        $upload->directoryId = $this->getValue('test_directory_id');
        $jobId = $upload->upload();

        (new Debug())->write($jobId);

    }

}