<?php

namespace LuzernTourismus\Pixxio\Com\ListBox;

use LuzernTourismus\Pixxio\Reader\CustomMetadataOption\CustomMetadataOptionDataReader;
use Nemundo\Admin\Com\ListBox\AdminListBox;

class CustomMetadataOptionListBox extends AdminListBox
{
    public function getContent()
    {
        $this->label = 'Custom Metadata Option';

        $reader = new CustomMetadataOptionDataReader();
        $reader->model->loadCustomMetadata();
        $reader
            ->addOrder($reader->model->customMetadata->name)
            ->addOrder($reader->model->option);
        foreach ($reader->getData() as $customMetadataRow) {
            $this->addItem($customMetadataRow->id, $customMetadataRow->customMetadata->name . ' - ' . $customMetadataRow->option);
        }

        return parent::getContent();
    }
}