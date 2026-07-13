<?php

namespace LuzernTourismus\Pixxio\Json\Collection;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class CollectionJsonReader extends AbstractJsonPixxioReader
{

    public $page = 1;
    public $pageSize = 20;


    protected function loadReader()
    {

        $this->endpoint = 'collections';
        $this->parameter = (new UrlBuilder(''))
            ->addRequestValue('page', $this->page)
            ->addRequestValue('pageSize', $this->pageSize)
            ->addRequestValue('responseFields', 'id,name,isDynamic,user')
            ->getUrl();

        $this->loopName = 'collections';

    }


    protected function onJson($json)
    {

        $item = new CollectionItem();
        $item->id = $json['id'];
        $item->collection = $json['name'];
        $item->userId = $json['user']['id'];
        $item->dynamicCollection = $json['isDynamic'];

        $this->addItem($item);

    }


    /**
     * @return CollectionItem[]
     */
    public function getData()
    {

        return parent::getData();

    }

}