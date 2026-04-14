<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\File;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Json\Reader\JsonReader;

class FileUpload extends AbstractBase
{

    public $subdomain;


    public $apiKey;


    public $fullFilename;

    public $title;

    public $description;

    public $directoryId;

    private $keywordList = [];

    private $customList = [];


    public function fromMediaspaceConfig(AbstractMediaspaceConfig $config)
    {
        $this->subdomain = $config->subdomain;
        $this->apiKey = $config->apiKey;

        return $this;

    }


    public function addKeyword($keyword)
    {

        if ((new ValueCheck())->hasValue($keyword)) {
            $this->keywordList[] = $keyword;
        }

        return $this;

    }


    public function addMetadata($id, $value)
    {

        if ($value !== null) {

            $custom = [];
            $custom['action'] = 'add';
            $custom['id'] = $id;
            $custom['value'] = $value;

            $this->customList[] = $custom;

        }

        return $this;


    }


    public function upload()
    {

        $data = [];

        if (sizeof($this->keywordList) > 0) {
            $keywordText = implode(',', array_unique($this->keywordList));
            $data['addKeywords'] = $keywordText;
        }

        if ($this->title !== null) {
            $data['fileName'] = $this->title;
        } else {
            $data['fileName'] = (new File($this->fullFilename))->getFilename();
        }

        if ($this->description !== null) {
            $data['appendDescription'] = $this->description;
        }

        if ($this->directoryId !== null) {
            $data['directoryID'] = $this->directoryId;
        }

        if (sizeof($this->customList) > 0) {
            $data['metadataCustom'] = (new JsonText())->addData($this->customList)->getJson();
        }


        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->uploadFile($this->fullFilename, $data);

        (new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        $success = $jsonData['success'];


        if ($success) {
            $jobId = $jsonData['jobID'];
        } else {
            //if (!$success) {
            (new Debug())->write($jsonData);
        }

        return $success;

//        {"success":true,"jobID":17893200}


    }

}