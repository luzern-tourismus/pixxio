<?php

namespace LuzernTourismus\Pixxio\Json\Base;

use LuzernTourismus\Pixxio\Json\PermissionGroup\PermissionGroup;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

abstract class AbstractJsonPixxioReader extends AbstractDataSource
{

    public $mediaSpace;


    public $apiKey;


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

        //$endpoint = 'directories';
        //$parameter = '?page=1&pageSize=20';


        $request = new PixxioWebRequest();
        $request->mediaSpace = $this->mediaSpace;
        $request->apiKey = $this->apiKey;

        //$response = (new PixxioWebRequest())->getData($this->endpoint, $this->parameter);
        $response = $request->getData($this->endpoint, $this->parameter);


        //(new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $this->jsonData = $jsonReader->getData();

        //$loopName = 'directories';
/*
        if (isset($jsonData['cursor'])) {
        $this->cursor = $jsonData['cursor'];

            pageCursor

        }*/

        //(new Debug())->write($cursor);


        //"cursor": "eyJzIjpbMTc3MzE1NDk4MDAwMCwiMzkxMzU6OjEyMDg5MzAyMjMiXX0=",


        foreach ($this->jsonData[$this->loopName] as $json) {

            $this->onJson($json);

            //(new Debug())->write($file);

            /*$item = new PermissionGroup();
            $item->id = $file['id'];
            $item->permissionGroup = $file['name'];

            $this->addItem($item);*/

        }

        $this->onFinished();

    }

}