<?php

namespace LuzernTourismus\Pixxio\Reader\Collection;

use LuzernTourismus\Pixxio\Data\Collection\CollectionReader;

class CollectionDataReader extends CollectionReader
{

    use CollectionFilterTrait;

    public function __construct()
    {

        parent::__construct();
        $this->model->loadMediaspace();

    }

}