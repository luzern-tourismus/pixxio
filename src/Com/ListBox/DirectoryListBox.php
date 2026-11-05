<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class DirectoryListBox extends AdminListBox
{
    public function getContent()
    {

        $this->label = 'Directory';

        $reader = new DirectoryDataReader();
        $reader
            ->addOrder($reader->model->directory)
            ->filterByActive();
        foreach ($reader->getData() as $directoryRow) {
            $this->addItem($directoryRow->id, $directoryRow->directory. ' ('.$directoryRow->id.')');
        }

        return parent::getContent();
    }
}