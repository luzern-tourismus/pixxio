<?php

namespace LuzernTourismus\Pixxio\Json\File;

use Nemundo\Core\Base\AbstractBase;

class FileCustomMetadataItem extends AbstractBase
{

    public $id;

    public $name;

    public $value;

    public $valueList = [];

    public $editType;

}