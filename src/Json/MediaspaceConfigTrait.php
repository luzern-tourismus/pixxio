<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\WebRequest\WebResponse;

trait MediaspaceConfigTrait
{

    public $subdomain;


    public $apiKey;

    public function fromMediaspaceConfig(AbstractMediaspaceConfig $config)
    {
        $this->subdomain = $config->subdomain;
        $this->apiKey = $config->apiKey;

        return $this;

    }


    protected function getSuccessMessage(WebResponse $response)
    {

        if ($response->statusCode !== StatusCode::OK) {
            (new Debug())->write($response);
        }

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        $success = $jsonData['success'];

        if (!$success) {
            (new Debug())->write($jsonData);
        }

        return $success;

    }

}