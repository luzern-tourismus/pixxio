<?php

namespace LuzernTourismus\Pixxio\Builder;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class CollectionBuilder extends AbstractBuilder
{

    public $collection;

    private $fileList = [];


    public function addFile($fileId)
    {

        $this->fileList[] = $fileId;
        return $this;

    }


    public function build()
    {

        $data = [];
        $data['name'] = $this->collection;

        if (sizeof($this->fileList) > 0) {
            $data['fileIDs'] = implode(',', $this->fileList);
        }

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->postData('collections', $data);


        //{"success":true,"id":896174845}

        $reader = new JsonReader();
        $reader->fromText($response->html);
        $data = $reader->getData();

        $collectionId = null;
        if ($data['success']) {
            $collectionId = $data['id'];
        }

        return $collectionId;

        //(new Debug())->write($response);

    }

}