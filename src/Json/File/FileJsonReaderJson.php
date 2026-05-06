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
            ->addRequestValue('responseFields', 'id,fileName,clipFileURL,description,directory,keywords,licenseReleases,description,importantMetadata,creator,metadataFields,modelReleases');


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

        //(new Debug())->write($json);

        $item = new FileJsonItem();
        $item->id = $json['id'];
        $item->filename = $json['fileName'];
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