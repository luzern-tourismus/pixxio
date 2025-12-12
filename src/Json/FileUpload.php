<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;

class FileUpload extends AbstractBase
{

    public function upload($filename)
    {

        (new PixxioWebRequest())->uploadFile($filename);


    }

}