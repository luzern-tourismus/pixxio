<?php

namespace LuzernTourismus\Pixxio\Json\User;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

class UserJsonItem extends AbstractBase
{

    //id,userName,displayName,email

    public $id;

    public $userName;

    public $displayName;

    public $email;

}