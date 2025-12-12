<?php

namespace LuzernTourismus\Pixxio\Json\User;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class UserBuilder extends AbstractBase
{

    public $email;


    public function build()
    {

        $data = [];
        $data['isActive'] = true;
        $data['email'] = $this->email;
        $data['userName'] = $this->email;
        $data['permissionGroupIDs'] = 30758595;

        //$json = (new JsonText())->addData($data)->getJson();
        //$response = (new PixxioWebRequest())->postData('users', $json);
        $response = (new PixxioWebRequest())->postData('users', $data);

        (new Debug())->write($response);

    }

}