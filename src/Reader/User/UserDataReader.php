<?php

namespace LuzernTourismus\Pixxio\Reader\User;

use LuzernTourismus\Pixxio\Data\User\UserReader;

class UserDataReader extends UserReader
{

    public function __construct() {
        parent::__construct();
        $this->model->loadMediaspace();
    }

}