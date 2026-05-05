<?php

namespace LuzernTourismus\Pixxio\Json\Job;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class JobJsonReader extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function getJob($jobId)
    {

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;

        $response = $request->getData('jobs/' . $jobId, '?responseFields=id&responseFields=jobData&responseFields=error&responseFields=jobType');

        (new Debug())->write($response);

    }


    protected function onJson($json)
    {

        (new Debug())->write($json);

    }

}