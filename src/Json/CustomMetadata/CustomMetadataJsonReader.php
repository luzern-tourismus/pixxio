<?php

namespace LuzernTourismus\Pixxio\Json\CustomMetadata;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Http\Url\UrlBuilder;

class CustomMetadataJsonReader extends AbstractJsonPixxioReader
{

    protected function loadReader()
    {

        //https://[EXAMPLE-MEDIASPACE].px.media/api/unstable/metadata/internal
        //https://[EXAMPLE-MEDIASPACE].px.media/api/unstable/metadata/important


        $this->endpoint = 'metadata/custom';
        //$this->endpoint = 'metadata/internal';
        //$this->endpoint = 'metadata/important';


        $url = new UrlBuilder('');
        $url
            ->addRequestValue('page', '1')
            ->addRequestValue('pageSize', '50')
            ->addRequestValue('responseFields', 'selectionOptions,name,createDate,editType,id,modifyDate,parentCondition,translationState');

        $this->parameter = $url->getUrl();

        $this->loopName = 'customMetadata';
        //$this->loopName = 'importantMetadata';

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