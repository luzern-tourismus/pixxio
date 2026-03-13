<?php

namespace LuzernTourismus\Pixxio\Json\PermissionGroup;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;

class PermissionGroupReaderJson extends AbstractJsonPixxioReader  // AbstractDataSource
{

    protected function loadReader()
    {

        $this->endpoint = 'permissionGroups';
        $this->parameter = '?page=1&pageSize=20';
$this->loopName='permissionGroups';

    }


    protected function onJson($json)
    {


    /*protected function loadData()
    {

        $endpoint = 'permissionGroups';
        $parameter = '?page=1&pageSize=20';

        $response = (new PixxioWebRequest())->getData($endpoint,$parameter);

        (new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();


        foreach ($jsonData['permissionGroups'] as $file) {*/

            $item = new PermissionGroup();
            $item->id = $json['id'];
            $item->permissionGroup = $json['name'];

            $this->addItem($item);

        //}

    }


    /**
     * @return PermissionGroup[]
     */
    public function getData()
    {

        return parent::getData();

    }

}