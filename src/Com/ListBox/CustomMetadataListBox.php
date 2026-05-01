<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\CustomMetadata\CustomMetadataDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class CustomMetadataListBox extends AdminListBox
{
    public function getContent()
    {

        $this->label = 'Custom Metadata';

        $reader = new CustomMetadataDataReader();
        foreach ($reader->getData() as $customMetadataRow) {
            $this->addItem($customMetadataRow->id, $customMetadataRow->mediaspace->mediaspace.' '. $customMetadataRow->name);
        }

        return parent::getContent();
    }
}