<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\Mediaspace\MediaspaceDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class MediaspaceListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Mediaspace';

        foreach ((new MediaspaceDataReader())->getData() as $mediaspaceRow) {
            $this->addItem($mediaspaceRow->id,$mediaspaceRow->mediaspace);
        }

        return parent::getContent();
    }
}