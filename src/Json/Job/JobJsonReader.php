<?php

namespace LuzernTourismus\Pixxio\Json\Job;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
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

        $response = $request->getData('jobs/'.$jobId,'');

        (new Debug())->write($response);

        //$jobId=22920798;

        //$this->endpoint = 'jobs/'.$jobId;


    }



    protected function onJson($json)
    {

        (new Debug())->write($json);

    }




    /*
$request = new PixxioWebRequest();
$request->fromMediaspaceConfig(new LuzernMediaspaceConfig());
$data = $request->getData('jobs/'.$jobId,'');
(new Debug())->write($data);
    */

}