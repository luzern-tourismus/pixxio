<?php

namespace LuzernTourismus\PixxioTest;

use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
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

        $reader = new JobJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $item = $reader->getJob($jobId);

        (new Debug())->write($item);


    }

}