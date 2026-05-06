<?php

namespace LuzernTourismus\Pixxio\Json\File;

use Nemundo\Core\Base\AbstractBase;

class FileJsonItem extends AbstractBase
{

    public $id;

    public $filename;

    public $fileUrl;

    public $description;

    public $directoryId;

    public $creator;

    public $keywordList = [];

}