<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\User\UserDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class UserListBox extends AdminListBox
{

    /*protected function loadContainer()
    {

        $this->name = (new MediaspaceParameter())->getParameterName();
        
    }*/

    public function getContent()
    {
        $this->label = 'Benutzer';

        foreach ((new UserDataReader())->getData() as $userRow) {
            $this->addItem($userRow->id, $userRow->userName);
        }

        return parent::getContent();
    }
}