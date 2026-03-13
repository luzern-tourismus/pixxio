<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class DirectoryListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Directory';

        foreach ((new DirectoryDataReader())->getData() as $directory) {
            $this->addItem($directory->id, $directory->directory);
        }


        return parent::getContent();
    }
}