<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\CustomMetadata\CustomMetadataDataReader;
use LuzernTourismus\Pixxio\Reader\CustomMetadataOption\CustomMetadataOptionDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class CustomMetadataOptionListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Custom Metadata Option';

        $reader = new CustomMetadataOptionDataReader();
        foreach ($reader->getData() as $customMetadataRow) {
            $this->addItem($customMetadataRow->id, $customMetadataRow->option);
        }

        return parent::getContent();
    }
}