<?php

namespace LuzernTourismus\Pixxio\Json\CustomMetadata;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class CustomMetadataJsonReader extends AbstractJsonPixxioReader
{

    protected function loadReader()
    {

        $this->endpoint = 'metadata/custom';

        $url = new UrlBuilder('');
        $url
            ->addRequestValue('page', '1')
            ->addRequestValue('pageSize', '50')
            ->addRequestValue('responseFields', 'selectionOptions,name,createDate,editType,id,modifyDate,parentCondition,translationState');

        $this->parameter = $url->getUrl();
        $this->loopName = 'customMetadata';

    }


    protected function onJson($json)
    {

        $item = new CustomMetadataItem($json);
        $item->id = $json['id'];
        $item->name = $json['name'];
        $item->type = $json['editType'];

        $this->addItem($item);

    }


    /**
     * @return CustomMetadataItem[]
     */
    public function getData()
    {

        return parent::getData();

    }

}