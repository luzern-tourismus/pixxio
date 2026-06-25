<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class FileJsonReaderJson extends AbstractJsonPixxioReader
{


    public $pageSize;


    protected $cursor;


    protected function loadReader()
    {

        $this->endpoint = 'files';

        $url = new UrlBuilder('');
        $url
            ->addRequestValue('pageSize', $this->pageSize)
            ->addRequestValue('responseFields', 'id,createDate,fileExtension,fileSize,fileName,subject,id,clipFileURL,description,directory,keywords,licenseReleases,description,importantMetadata,creator,metadataFields,modelReleases,originalFileURL');

        if ($this->hasCursor()) {
            $url->addRequestValue('pageCursor', $this->getCursor());
        }


        $this->parameter =  $url->getUrl();

        //$this->parameter = '/1415387842'. $url->getUrl();


        $this->loopName = 'files';

    }


    protected function onFinished()
    {

        $this->cursor = null;
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
        $item->fileUrl = $json['originalFileURL'];
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