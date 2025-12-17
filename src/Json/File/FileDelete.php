<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;

class FileDelete extends AbstractBase
{

    public function deleteFile($id)
    {

        (new PixxioWebRequest())->deleteData('files',$id);

    }


}