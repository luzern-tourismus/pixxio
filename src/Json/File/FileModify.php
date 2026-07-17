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

class FileModify extends AbstractBase
{

    use MediaspaceConfigTrait;

    //public $fullFilename;


    public $subject;


    public $description;


    //public $directoryId;


    private $keywordList = [];

    private $metadataStandardList = [];

    private $customList = [];


    private $customMultiList = [];


    public function addKeyword($keyword)
    {

        if ((new ValueCheck())->hasValue($keyword)) {
            $this->keywordList[] = $keyword;
        }

        return $this;

    }


    /*public function addMetadata($id, $value)
    {

        if ($value !== null) {

            $custom = [];
            $custom['action'] = 'add';
            $custom['id'] = $id;
            $custom['value'] = $value;

            $this->customList[] = $custom;

        }

        return $this;

    }*/


    public function replaceCustomMetadata($id, $value)
    {

        $this->modifyCustomMetadata('replace', $id, $value);
        return $this;

    }


    public function removeMetadata($id)
    {

        $this->modifyCustomMetadata('remove', $id, '');
        return $this;

    }


    private function modifyCustomMetadata($action, $id, $value)
    {

        if ($value !== null) {

            $custom = [];
            $custom['action'] = $action;
            $custom['id'] = $id;
            $custom['value'] = $value;

            $this->customList[] = $custom;

        }

    }




    public function replaceStandardMetadata($id, $value)
    {

        $this->modifyStandardMetadata('replace', $id, $value);
        return $this;

    }



    private function modifyStandardMetadata($action, $id, $value)
    {

        if ($value !== null) {

            $custom = [];
            $custom['action'] = $action;
            $custom['id'] = $id;
            $custom['value'] = $value;

            $this->metadataStandardList[] = $custom;

        }

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


    public function modify($fileId)
    {

        $data = [];
        $data['ids'] = $fileId;

        if (sizeof($this->keywordList) > 0) {
            $keywordText = implode(',', array_unique($this->keywordList));
            $data['keywords'] = $keywordText;
        }

        //$data['fileName'] = (new File($this->fullFilename))->getFilename();

        if ($this->subject !== null) {
            $data['subject'] = $this->subject;
        }

        if ($this->description !== null) {
            $data['description'] = $this->description;
        }

        /*if ($this->directoryId !== null) {
            $data['directoryID'] = $this->directoryId;
        }*/

        foreach ($this->customMultiList as $customMulti) {
            $this->customList[] = $customMulti;
        }

        if (sizeof($this->customList) > 0) {
            $data['metadataCustom'] = (new JsonText())->addData($this->customList)->getJson();
        }

        if (sizeof($this->metadataStandardList) > 0) {
            $data['metadataStandard'] = (new JsonText())->addData($this->metadataStandardList)->getJson();
        }

        if (PixxioConfig::$debugMode) {
            (new Debug())->write($data);
        }

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->putData('files',$data);

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