<?php

namespace LuzernTourismus\Pixxio\Reader;

use LuzernTourismus\Pixxio\Json\FileJsonItem;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class PermissionGroupReader extends AbstractDataSource
{

    protected function loadData()
    {

        $endpoint = 'permissionGroups';
        $parameter = '?page=1&pageSize=20';

        $response = (new PixxioWebRequest())->getData($endpoint,$parameter);

        (new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();


        foreach ($jsonData['permissionGroups'] as $file) {

            $item = new PermissionGroup();
            $item->id = $file['id'];
            $item->permissionGroup = $file['name'];

            $this->addItem($item);

        }

    }


    /**
     * @return PermissionGroup[]
     */
    public function getData()
    {

        return parent::getData();

    }

}