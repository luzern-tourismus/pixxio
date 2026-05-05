<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\File\File;
use Nemundo\Core\Json\JsonText;
use Nemundo\Core\Json\Reader\JsonReader;

class FileUpload extends AbstractBase
{

    use MediaspaceConfigTrait;

    public $fullFilename;


    public $title;


    public $description;


    public $directoryId;

    private $keywordList = [];

    private $customList = [];


    private $customMultiList = [];


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


    public function addMultiMetadata($id, $value)
    {

        if ($value !== null) {

            /*$custom = [];
            $custom['action'] = 'add';
            $custom['id'] = $id;
            $custom['value'] = $value;*/

            $this->customMultiList[$id]['action'] = 'add';
            $this->customMultiList[$id]['id'] = $id;
            $this->customMultiList[$id]['value'][] = $value;

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


        foreach ($this->customMultiList as $customMulti) {
            $this->customList[] = $customMulti;
        }


        if (sizeof($this->customList) > 0) {
            $data['metadataCustom'] = (new JsonText())->addData($this->customList)->getJson();
        }

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->uploadImage($this->fullFilename, $data);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        if (isset($jsonData['jobID'])) {
            $jobId = $jsonData['jobID'];
        } else {
            (new Debug())->write($jsonData);
        }

        return $jobId;

        /*$success = $this->getSuccessMessage($response);
        return $success;*/


    }

}