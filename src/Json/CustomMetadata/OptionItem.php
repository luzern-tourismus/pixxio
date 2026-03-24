<?php

namespace LuzernTourismus\Pixxio\Json\CustomMetadata;

use Nemundo\Core\Base\AbstractBase;

class OptionItem extends AbstractBase
{

    public $id;

    public $name;

    public function __construct($json)
    {

        $this->id = $json['id'];
        $this->name = $json['name'];

    }

}