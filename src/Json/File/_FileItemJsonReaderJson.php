<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use Nemundo\Core\Debug\Debug;

class FileItemJsonReaderJson extends AbstractJsonPixxioReader
{

    public $id;

    protected function loadReader()
    {

        $this->endpoint = 'files/'.$this->id;  //.'?directoryResponseFields=id&directoryResponseFields=clipFileURL';
        $this->loopName = 'file';

    }


    protected function onJson($json)
    {

        (new Debug())->write($json);

        $item = new FileJsonItem();
        $item->id = $json['id'];
        $item->filename = $json['fileName'];

        $this->addItem($item);

    }


    /**
     * @return FileJsonItem[]
     */
    public function getData()
    {

        return parent::getData();

    }

}