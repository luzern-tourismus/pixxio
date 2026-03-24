<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;

class FileJsonDelete extends AbstractBase
{

    public $mediaSpace;


    public $apiKey;

    public function deleteFile($id)
    {

        $request = new PixxioWebRequest();
        $request->subdomain = $this->mediaSpace;
        $request->apiKey = $this->apiKey;
        $request->deleteData('files', $id);

    }

}