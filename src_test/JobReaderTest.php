<?php

namespace LuzernTourismus\PixxioTest;

use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use Nemundo\Core\Debug\Debug;

class JobReaderTest extends AbstractTest
{

    public function runTest()
    {

        $jobId = $this->getValue('test_job_id');

        $reader = new JobJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $item = $reader->getJob($jobId);

        (new Debug())->write($item);


    }

}