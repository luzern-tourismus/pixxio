<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

class JobJsonReaderTest extends AbstractPixxioTest
{


    protected function loadTest()
    {
     $this->testName = 'job-json-read';
    }



    public function runTest()
    {

        $jobId = $this->getValue('test_job_id');

        $reader = new \LuzernTourismus\Pixxio\Json\Job\JobJsonReader();
        $reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $job = $reader->getJob($jobId);

        (new Debug())->write($job);

    }

}