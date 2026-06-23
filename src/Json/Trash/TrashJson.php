<?php

namespace LuzernTourismus\Pixxio\Json\Trash;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Number\YesNo;

class TrashJson extends AbstractBase
{

    use MediaspaceConfigTrait;


    public function deleteFile($fileId)
    {

        $data = [];
        $data['fileIDs'] = $fileId;

        $this->deleteData($data);

    }


    public function deleteAll()
    {

        $data = [];
        $data['all'] = (new YesNo(true))->getText();

        $this->deleteData($data);

    }


    private function deleteData($data)
    {

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $request->deleteParameter('files/trash', $data);

    }

}