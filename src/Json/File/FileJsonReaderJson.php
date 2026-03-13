<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class FileJsonReaderJson extends AbstractJsonPixxioReader
{

    protected $cursor;


    protected function loadReader()
    {

        $this->endpoint = 'files';

        $url = new UrlBuilder('');
        $url
            ->addRequestValue('pageSize', '20')
            ->addRequestValue('responseFields','id,fileName,clipFileURL,directory,keywords,licenseReleases,description,importantMetadata,creator,metadataFields,modelReleases');

//Items Enum: "clipFileURL" "colorspace" "createDate" "creator" "description" "directory" "dominantColor" "fileExtension" "fileName" "fileSize" "fileState" "fileType" "hasSubversions" "height" "id" "importantMetadata" "isArchived" "isCheckedOut" "isConvertible" "isDownloadLocked" "isMainVersion" "isMarked" "isRotatable" "keywords" "keywordsRecognition" "languageCodes" "licenseReleases" "location" "md5sum" "metadataFields" "modelReleases" "modifiedPreviewFileURLs" "modifyDate" "orientation" "originalFileURL" "permissions" "pixel" "previewFileURL" "propertyReleases" "rating" "rotation" "staticCollections" "subject" "uploadDate" "user" "variantStack" "versions" "width"



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
        $item->filename = $json['fileName'];
        $item->fileUrl = $json['clipFileURL'];
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