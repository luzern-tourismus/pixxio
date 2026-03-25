<?php

namespace LuzernTourismus\Pixxio\Builder;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractBuilder extends AbstractBase
{


    use MediaspaceConfigTrait;

    abstract public function build();

}