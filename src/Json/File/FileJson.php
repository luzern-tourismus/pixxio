<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Json\Reader\JsonReader;

class FileJson extends AbstractBase  // AbstractJsonPixxioReader
{

    use MediaspaceConfigTrait;

    //public $pageSize;


    //protected $cursor;


    public function getFile($fileId)
    {

        $endpoint = 'files';

        $url = new UrlBuilder('');
        $url
            //->addRequestValue('pageSize', $this->pageSize)
            ->addRequestValue('responseFields', 'id,createDate,fileExtension,fileSize,fileName,subject,id,clipFileURL,description,directory,keywords,licenseReleases,description,importantMetadata,creator,metadataFields,modelReleases,originalFileURL');

        /*if ($this->hasCursor()) {
            $url->addRequestValue('pageCursor', $this->getCursor());
        }*/


        //$this->parameter =  $url->getUrl();

        $parameter = '/' . $fileId . $url->getUrl();
        $loopName = 'file';


        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;

        $response = $request->getData($endpoint, $parameter);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        //(new Debug())->write($jsonData);


        //$item = new FileJsonItem();

        //if (isset($jsonData[$loopName])) {

        $json = $jsonData[$loopName];

        //(new Debug())->write($json);
        //exit;

        //foreach ($jsonData[$loopName] as $json) {
        /*$this->onJson($json);
    }
} else {
    (new Debug())->write($response);
}*/


        $item = new FileJsonItem();
        $item->id = $json['id'];
        $item->subject = $json['subject'];
        $item->fileName = $json['fileName'];
        $item->fileExtension = $json['fileExtension'];
        $item->fileSize = $json['fileSize'];
        $item->fileUrl = $json['originalFileURL'];
        $item->description = $json['description'];
        $item->keywordList = $json['keywords'];
        $item->creator = $json['creator'];
        $item->directoryId = $json['directory']['id'];

        //}


        //}


        return $item;


    }


    /*protected function onFinished()
    {

        $this->cursor = null;
        if (isset($this->jsonData['cursor'])) {
            $this->cursor = $this->jsonData['cursor'];
        }

    }*/


    /*     protected
         function onJson($json)
         {

             $item = new FileJsonItem();
             $item->id = $json['id'];
             $item->subject = $json['subject'];
             $item->fileName = $json['fileName'];
             $item->fileExtension = $json['fileExtension'];
             $item->fileSize = $json['fileSize'];
             $item->fileUrl = $json['originalFileURL'];
             $item->description = $json['description'];
             $item->keywordList = $json['keywords'];
             $item->creator = $json['creator'];
             $item->directoryId = $json['directory']['id'];

             $this->addItem($item);

         }*/


    /**
     * @return FileJsonItem[]
     */
    /*public function getData()
    {

        $this->loaded = false;
        return parent::getData();

    }


    public function hasCursor()
    {

        $value = false;
        if ($this->cursor !== null) {
            $value = true;
        }

        return $value;

    }


    public function getCursor()
    {

        return $this->cursor;

    }*/

}