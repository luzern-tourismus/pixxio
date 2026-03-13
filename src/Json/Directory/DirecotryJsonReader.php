<?php

namespace LuzernTourismus\Pixxio\Json\Directory;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class DirecotryJsonReader extends AbstractJsonPixxioReader
{

    public $page;

    protected function loadReader()
    {

        $this->endpoint = 'directories';

        $this->parameter =(new UrlBuilder(''))
            ->addRequestValue('page',$this->page)
            ->addRequestValue('pageSize',20)
        ->getUrl();

            //'?page=2&pageSize=20';


        $this->loopName = 'directories';

    }


    protected function onJson($json)
    {

        $item = new DirectoryItem();
        $item->id = $json['id'];
        $item->directory = $json['name'];

        $this->addItem($item);

    }


    /**
     * @return DirectoryItem[]
     */
    public function getData()
    {

        return parent::getData();

    }

}