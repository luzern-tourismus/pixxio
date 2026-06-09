<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlBuilder;

class FileJsonReaderJson extends AbstractJsonPixxioReader
{


    public $pageSize = 20;


    protected $cursor;


    protected function loadReader()
    {

        $this->endpoint = 'files';

        $url = new UrlBuilder('');
        $url
            //->addRequestValue('showFiles',false)
            ->addRequestValue('pageSize', $this->pageSize)
            ->addRequestValue('responseFields', 'id,createDate,fileExtension,fileSize,fileName,subject,id,clipFileURL,description,directory,keywords,licenseReleases,description,importantMetadata,creator,metadataFields,modelReleases');



/*        Array of strings (Array of ResponseFields)
Default: "id&responseFields=fileName"
Items Enum: "clipFileURL" "colorspace" "createDate" "creator" "description" "directory" "dominantColor" "fileExtension" "fileName" "fileSize" "fileState" "fileType" "hasSubversions" "height" "id" "importantMetadata" "isArchived" "isCheckedOut" "isConvertible" "isDownloadLocked" "isMainVersion" "isMarked" "isRotatable" "keywords" "keywordsRecognition" "languageCodes" "licenseReleases" "location" "md5sum" "metadataFields" "modelReleases" "modifiedPreviewFileURLs" "modifyDate" "orientation" "originalFileURL" "permissions" "pixel" "previewFileURL" "propertyReleases" "rating" "rotation" "staticCollections" "subject" "uploadDate" "user" "variantStack" "versions" "width"
  */


/*        Array of strings (Array of ResponseFields)
Default: "id&responseFields=fileName"
Items Enum: "clipFileURL" "colorspace" "createDate" "creator" "description" "directory" "dominantColor" "fileExtension" "fileName" "fileSize" "fileState" "fileType" "hasSubversions" "height" "id" "importantMetadata" "isArchived" "isCheckedOut" "isConvertible" "isDownloadLocked" "isMainVersion" "isMarked" "isRotatable" "keywords" "keywordsRecognition" "languageCodes" "licenseReleases" "location" "md5sum" "metadataFields" "modelReleases" "modifiedPreviewFileURLs" "modifyDate" "orientation" "originalFileURL" "permissions" "pixel" "previewFileURL" "propertyReleases" "rating" "rotation" "staticCollections" "subject" "uploadDate" "user" "variantStack" "versions" "width"
  */



            //->addRequestValue('responseFields', 'importantMetadata');


        //    ->addRequestValue('userResponseFields', 'id,displayName,isActive');
//                ->addRequestValue('importantMetadataResponseFields','name')
//        ->addRequestValue('responseFields', 'importantMetadata,id,fileName,clipFileURL,description,directory,keywords,licenseReleases,description,importantMetadata,creator,metadataFields,modelReleases');


        if ($this->hasCursor()) {
            $url->addRequestValue('pageCursor', $this->getCursor());
        }

        $this->parameter = $url->getUrl();
        $this->loopName = 'files';

    }


    protected function onFinished()
    {

        if (isset($this->jsonData['cursor'])) {
            $this->cursor = $this->jsonData['cursor'];
        }

    }


    protected function onJson($json)
    {

        $item = new FileJsonItem();
        $item->id = $json['id'];
        $item->subject = $json['subject'];
        $item->fileName = $json['fileName'];
        $item->fileExtension = $json['fileExtension'];
        $item->fileSize = $json['fileSize'];
        $item->fileUrl = $json['clipFileURL'];
        $item->description = $json['description'];
        $item->keywordList = $json['keywords'];
        $item->creator = $json['creator'];
        $item->directoryId = $json['directory']['id'];

        $this->addItem($item);

    }


    /**
     * @return FileJsonItem[]
     */
    public function getData()
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

    }

}