<?php

namespace LuzernTourismus\Pixxio\Json\Directory;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Http\Url\UrlBuilder;

class DirecotryJsonReader extends AbstractJsonPixxioReader
{

    public $page = 1;

    protected function loadReader()
    {

        $this->endpoint = 'directories';

        $this->parameter = (new UrlBuilder(''))
            ->addRequestValue('page', $this->page)
            ->addRequestValue('pageSize', 20)
            ->addRequestValue('responseFields', 'id,name,modifyDate,createDate,hasChildren,modifyDate,parentID,path,permissions,quantity,quantityWithSubdirectories')
            //->addRequestValue('responseFields', '"id,modifyDate,createDate,hasChildren,modifyDate,parentID,path,permissions,quantity,quantityWithSubdirectories"')
            ->getUrl();

        //"createDate" "hasChildren" "id" "modifyDate" "name" "parentID" "path" "permissions" "quantity" "quantityWithSubdirectories"

        //'?page=2&pageSize=20';


        $this->loopName = 'directories';

    }


    protected function onJson($json)
    {
        $quantity = 0;

        if ((new ValueCheck())->hasValue($json['quantity'])) {
            $quantity = $json['quantity'];
        }

        $item = new DirectoryItem();
        $item->id = $json['id'];
        $item->directory = $json['name'];
        $item->quantity = $quantity;  // $json['quantity'];
        $item->parentId = $json['parentID'];

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