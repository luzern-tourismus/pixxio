<?php

namespace LuzernTourismus\Pixxio\Mediaspace;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractMediaspace extends AbstractBase
{

    public $mediaSpace;

    public $apiKey;

    abstract protected function loadMediaspace();


    public function __construct()
    {

        $this->loadMediaspace();

    }


}