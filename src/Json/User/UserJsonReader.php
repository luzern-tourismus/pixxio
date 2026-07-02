<?php

namespace LuzernTourismus\Pixxio\Json\User;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Http\Url\UrlBuilder;

class UserJsonReader extends AbstractJsonPixxioReader
{

    use MediaspaceConfigTrait;

    public $fileId;


    protected function loadReader()
    {

        $this->endpoint = 'users';

        $url = new UrlBuilder('');
        $url->addRequestValue('page', 1);
        $url->addRequestValue('pageSize', 100);
        $url->addRequestValue('responseFields', 'id,userName,displayName,email');

        $this->parameter = $url->getUrl();
        $this->loopName = 'users';

    }


    protected function onJson($json)
    {

        $item = new UserJsonItem();
        $item->id = $json['id'];
        $item->userName = $json['userName'];
        $item->displayName = $json['displayName'];
        $item->email = $json['email'];

        $this->addItem($item);

    }


    /**
     * @return UserJsonItem[]
     */
    public function getData()
    {

        $this->loaded = false;
        return parent::getData();

    }

}