<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Import\JobImport;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;

class JobReaderTest extends AbstractPixxioTest
{


    protected function loadTest()
    {
        $this->testName = 'job-read';
    }



    public function runTest()
    {

        $jobId = $this->getValue('test_job_id');


        $import = new JobImport();
        $import->fromMediaspaceConfig(new MediaspaceConfigTest());
        $import->importJob($jobId);


        /*$reader = new JobJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $item = $reader->getJob($jobId);

        (new Debug())->write($item);*/


    }

}