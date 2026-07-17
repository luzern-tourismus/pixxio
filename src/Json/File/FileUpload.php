<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
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


    public $subject;


    public $description;


    public $directoryId;


    private $keywordList = [];


    private $standardMetadataList = [];

    private $customMetadataList = [];


    private $customMultiList = [];


    public function addKeyword($keyword)
    {

        if ((new ValueCheck())->hasValue($keyword)) {
            $this->keywordList[] = $keyword;
        }

        return $this;

    }



    public function addStandardMetadata($id, $value)
    {

        if ($value !== null) {

            $custom = [];
            $custom['action'] = 'add';
            $custom['id'] = $id;
            $custom['value'] = $value;

            $this->standardMetadataList[] = $custom;

        }

        return $this;

    }



    public function addCustomMetadata($id, $value)
    {

        if ($value !== null) {

            $custom = [];
            $custom['action'] = 'add';
            $custom['id'] = $id;
            $custom['value'] = $value;

            $this->customMetadataList[] = $custom;

        }

        return $this;

    }


    public function addMultiMetadata($id, $value)
    {

        if ($value !== null) {

            $this->customMultiList[$id]['action'] = 'add';
            $this->customMultiList[$id]['id'] = $id;
            $this->customMultiList[$id]['value'][] = $value;

            $this->customMultiList[$id]['value'] = array_unique($this->customMultiList[$id]['value']);

        }

        return $this;

    }


    public function upload()
    {

        $data = [];

        if (sizeof($this->keywordList) > 0) {
            $keywordText = implode(',', array_unique($this->keywordList));
            $data['keywords'] = $keywordText;
        }

        $data['fileName'] = (new File($this->fullFilename))->getFilename();

        if ($this->subject !== null) {
            $data['subject'] = $this->subject;
        }

        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        if ($this->directoryId !== null) {
            $data['directoryID'] = $this->directoryId;
        }

        if (sizeof($this->standardMetadataList) > 0) {
            $data['metadataStandard'] = (new JsonText())->addData($this->standardMetadataList)->getJson();
        }


        foreach ($this->customMultiList as $customMulti) {
            $this->customMetadataList[] = $customMulti;
        }

        if (sizeof($this->customMetadataList) > 0) {
            $data['metadataCustom'] = (new JsonText())->addData($this->customMetadataList)->getJson();
        }



        if (PixxioConfig::$debugMode) {
            //(new Debug())->write($data);
        }

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->uploadImage($this->fullFilename, $data);

        //(new Debug())->write($response);


        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        $jobId = null;
        if (isset($jsonData['jobID'])) {
            $jobId = $jsonData['jobID'];
        } else {
            (new Debug())->write($jsonData);
        }

        return $jobId;

    }

}