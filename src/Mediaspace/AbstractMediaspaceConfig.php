<?php

namespace LuzernTourismus\Pixxio\Mediaspace;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractMediaspaceConfig extends AbstractBase
{

    public $subdomain;

    public $apiKey;

    abstract protected function loadMediaspace();


    public function __construct()
    {

        $this->loadMediaspace();

    }


}