<?php

namespace LuzernTourismus\Pixxio\Json\Comment;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use LuzernTourismus\Pixxio\Json\File\FileJsonItem;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Type\DateTime\DateTime;

class CommentJsonReader extends AbstractJsonPixxioReader
{

    use MediaspaceConfigTrait;

    public $fileId;


    protected function loadReader()
    {

        $this->endpoint = 'files/'.$this->fileId.'/comments';

        $url = new UrlBuilder('');
        $url->addRequestValue('page',1);
        $url->addRequestValue('pageSize',100);
        $url->addRequestValue('responseFields', 'id,comment,createDate,modifyDate,user');

        $this->parameter =  $url->getUrl();
        $this->loopName = 'comments';

    }


    protected function onJson($json)
    {

        $item = new CommentJsonItem();
        $item->id = $json['id'];
        $item->comment = $json['comment'];
        $item->userId = $json['user']['id'];
        $item->dateTime = new DateTime($json['createDate']);

        $this->addItem($item);

    }


    /**
     * @return CommentJsonItem[]
     */
    public function getData()
    {

        $this->loaded = false;
        return parent::getData();

    }

}