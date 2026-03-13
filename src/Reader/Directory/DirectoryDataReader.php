<?php

namespace LuzernTourismus\Pixxio\Reader\Directory;

use LuzernTourismus\Pixxio\Data\Directory\DirectoryReader;
use Nemundo\Core\Check\ValueCheck;

class DirectoryDataReader extends DirectoryReader
{

    public function __construct()
    {

        parent::__construct();
        $this->model->loadMediaspace();

    }

    public function filterMediaspace($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->mediaspaceId, $mediaspaceId);
        }

        return $this;


    }

}