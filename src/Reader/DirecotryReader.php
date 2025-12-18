<?php

namespace LuzernTourismus\Pixxio\Reader;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class DirecotryReader extends AbstractDataSource
{

    protected function loadData()
    {


        //https://[EXAMPLE-MEDIASPACE].px.media/api/v1/directories

        //https://[EXAMPLE-MEDIASPACE].px.media/api/v1/metadata/internal
        //$endpoint = 'metadata/internal';

        //$endpoint='metadata/important';
        $endpoint='directories';




        //$parameter='';
        $parameter = '?page=1&pageSize=20';

        $response = (new PixxioWebRequest())->getData($endpoint,$parameter);

        (new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();


//'internalMetadata'
        //$loopName = 'importantMetadata';
        $loopName='directories';

        foreach ($jsonData[$loopName] as $file) {

            (new Debug())->write($file);

            /*$item = new PermissionGroup();
            $item->id = $file['id'];
            $item->permissionGroup = $file['name'];

            $this->addItem($item);*/

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