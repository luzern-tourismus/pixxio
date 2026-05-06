<?php

namespace LuzernTourismus\Pixxio\Json\Base;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Json\Reader\JsonReader;

abstract class AbstractJsonPixxioReader extends AbstractDataSource
{

    use MediaspaceConfigTrait;

    protected $endpoint;

    protected $parameter;

    protected $loopName;

    protected $jsonData;

    abstract protected function loadReader();

    abstract protected function onJson($json);

    protected function onFinished()
    {

    }

    protected function loadData()
    {

        $this->loadReader();

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;

        $response = $request->getData($this->endpoint, $this->parameter);

        //(new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $this->jsonData = $jsonReader->getData();

        if (isset($this->jsonData[$this->loopName])) {
            foreach ($this->jsonData[$this->loopName] as $json) {
                $this->onJson($json);
            }
        }


        $this->onFinished();

    }

}