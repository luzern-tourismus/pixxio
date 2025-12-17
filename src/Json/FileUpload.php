<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\File\File;
use Nemundo\Core\Json\JsonText;

class FileUpload extends AbstractBase
{


    public $fullFilename;

    public $title;

    public $description;

    private $keywordList = [];

    private $customList = [];


    public function addKeyword($keyword)
    {

        $this->keywordList[] = $keyword;
        return $this;

    }


    public function addMetadata($id, $value)
    {

        $custom = [];
        $custom['action'] = 'add';
        $custom['id'] = $id; // 75540013;
        $custom['value'] = $value; // 'asdfasdfsad';

        $this->customList[] = $custom;

        return $this;


    }


    public function upload()
    {

        $data = [];
        if (sizeof($this->keywordList) > 0) {
            $keywordText = implode(',', $this->keywordList);
            $data['addKeywords'] = $keywordText;
        }

        if ($this->title !== null) {
            $data['fileName'] = $this->title;

            //$data['fileName']= (new File($filename))->getFilename();

        } else {
            $data['fileName'] = (new File($this->fullFilename))->getFilename();
        }

        if ($this->description !== null) {
            $data['appendDescription'] = $this->description;
        }


        //$data['metadataStandard']='blablabla,75540013';
        //$data['metadataStandard']='blablabla';


        /*$customList=[];

        $custom = [];
        $custom['action']='add';
        $custom['id']=75540013;
        $custom['value'] = 'asdfasdfsad';

        $customList[] = $custom;*/

        //$data['metadataCustom']= {};  // $customList;

        //metadataStandard


        //$data['metadataCustom']= '{ ["adsf",75540013]}';  // $customList;
        if (sizeof($this->customList) > 0) {
            $data['metadataCustom'] = (new JsonText())->addData($this->customList)->getJson();   // (new JsonDocument())->addRow($custom)->ad ->get ["adsf",75540013];  // $customList;
        }

        (new PixxioWebRequest())->uploadFile($this->fullFilename, $data);


    }

}