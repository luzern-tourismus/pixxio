<?php

namespace LuzernTourismus\Pixxio\Mediaspace;

use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceId;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractMediaspaceConfig extends AbstractBase
{

    public $url;

    public $apiKey;

    abstract protected function loadMediaspace();


    public function __construct()
    {

        $this->loadMediaspace();

    }


    public function getMediaspaceId()
    {

        $id = new MediaspaceId();
        $id->filter->andEqual($id->model->url, $this->url);
        $mediaspaceid = $id->getId();

        return $mediaspaceid;

    }

}