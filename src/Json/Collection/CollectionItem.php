<?php

namespace LuzernTourismus\Pixxio\Json\Collection;

use Nemundo\Core\Base\AbstractBase;

class CollectionItem extends AbstractBase
{

    public $id;

    public $collection;

    public $userId;

    /**
     * @var bool
     */
    public $dynamicCollection= false;

}