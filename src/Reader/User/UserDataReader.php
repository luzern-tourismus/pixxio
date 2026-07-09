<?php

namespace LuzernTourismus\Pixxio\Reader\User;

use LuzernTourismus\Pixxio\Data\User\UserReader;
use Nemundo\Core\Check\ValueCheck;

class UserDataReader extends UserReader
{

    public function __construct() {
        parent::__construct();
        $this->model->loadMediaspace();
    }


    public function filterByMediaspace($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->mediaspaceId, $mediaspaceId);
        }

        return $this;

    }


}