<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\DataSource\AbstractDataSource;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class FileJsonReader extends AbstractDataSource
{

    protected function loadData()
    {

        $endpoint = 'files';
        $parameter = '?page=1&pageSize=200';

        $response = (new PixxioWebRequest())->getData($endpoint, $parameter);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        foreach ($jsonData['files'] as $file) {

            (new Debug())->write($file);

            $item = new FileJsonItem();
            $item->id = $file['id'];
            $item->filename = $file['fileName'];

            $this->addItem($item);

        }

    }


    /**
     * @return FileJsonItem[]
     */
    public function getData()
    {

        return parent::getData();

    }


}