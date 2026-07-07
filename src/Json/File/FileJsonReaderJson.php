<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class FileJsonReaderJson extends AbstractJsonPixxioReader
{


    public $pageSize;


    public $filter;

    protected $cursor;


    public $filterByCollectionId;


    protected function loadReader()
    {

        $this->endpoint = 'files';

        $url = new UrlBuilder('');
        $url
            ->addRequestValue('pageSize', $this->pageSize)
            ->addRequestValue('responseFields', FileConfig::$responseField);

        if ($this->hasCursor()) {
            $url->addRequestValue('pageCursor', $this->getCursor());
        }

        if ($this->filterByCollectionId !== null) {

            $url->addRequestValue('filter', '{
    "filterType": "connectorAnd",
    "filters": [
      {
        "filterType": "collection",
        "collectionID": ' . $this->filterByCollectionId . ',
        "inverted": false
      }
    ],
    "inverted": false
    }');
        }


        $this->parameter = $url->getUrl();
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

        $item = new FileJsonItem($json);
        $this->addItem($item);

    }


    /**
     * @return FileJsonItem[]
     */
    public function getData()
    {

        $this->loaded = false;
        $this->clearList();
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