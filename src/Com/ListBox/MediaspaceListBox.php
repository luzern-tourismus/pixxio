<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Parameter\MediaspaceParameter;
use LuzernTourismus\Pixxio\Reader\Mediaspace\MediaspaceDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class MediaspaceListBox extends AdminListBox
{

    protected function loadContainer()
    {

        $this->name = (new MediaspaceParameter())->getParameterName();
        
    }

    public function getContent()
    {
        $this->label = 'Mediaspace';

        foreach ((new MediaspaceDataReader())->getData() as $mediaspaceRow) {
            $this->addItem($mediaspaceRow->id,$mediaspaceRow->mediaspace);
        }

        return parent::getContent();
    }
}