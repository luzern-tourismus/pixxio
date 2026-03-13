<?php

namespace LuzernTourismus\Pixxio\Json\Collection;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;

class CollectionJsonReaderJson extends AbstractJsonPixxioReader  // AbstractDataSource
{


    protected function loadReader()
    {

        $this->endpoint = 'collections';
        $this->parameter = '?page=1&pageSize=20';
        $this->loopName = 'collections';

    }


    protected function onJson($json)
    {

        /*}


        protected function loadData()
        {

            $endpoint = 'collections';
            $parameter = '?page=1&pageSize=20';

            $response = (new PixxioWebRequest())->getData($endpoint,$parameter);

            (new Debug())->write($response);

            $jsonReader = new JsonReader();
            $jsonReader->fromText($response->html);
            $jsonData = $jsonReader->getData();


            foreach ($jsonData['collections'] as $collection) {
    */

        $item = new CollectionItem();
        $item->id = $json['id'];
        $item->collection = $json['name'];

        $this->addItem($item);

        //}

    }


    /**
     * @return CollectionItem[]
     */
    public function getData()
    {

        return parent::getData();

    }

}