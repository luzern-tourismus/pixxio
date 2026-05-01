<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataReader;
use LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionReader;
use LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader;
use LuzernTourismus\Pixxio\Reader\CustomMetadata\CustomMetadataDataReader;
use LuzernTourismus\Pixxio\Reader\Mediaspace\MediaspaceDataReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;

class CustomMetadataPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        if ($mediaspace->hasValue()) {

            $table = new AdminTable($layout);

            $mediaspaceRow = (new MediaspaceDataReader())->getRowById($mediaspace->getValue());

            $customMetadataReader = new CustomMetadataDataReader();
            $customMetadataReader->filter->andEqual($customMetadataReader->model->mediaspaceId,$mediaspaceRow->id);

            (new AdminTableHeader($table))
                ->addText($customMetadataReader->model->id->label)
                ->addText($customMetadataReader->model->name->label)
                ->addText($customMetadataReader->model->type->label)
                ->addText('Option');

            foreach ($customMetadataReader->getData() as $customMetadataRow) {

                $row = new AdminTableRow($table);

                $row
                    ->addText($customMetadataRow->id)
                    ->addText($customMetadataRow->name)
                    ->addText($customMetadataRow->type->type);

                $ul = new AdminUnorderedList($row);

                $optionReader = new CustomMetadataOptionReader();
                $optionReader->filter->andEqual($optionReader->model->customMetadataId,$customMetadataRow->id);
                foreach ($optionReader->getData() as $optionRow) {
                    $ul->addText($optionRow->id . ' - ' . $optionRow->option);
                }

            }

        }






        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        if ($mediaspace->hasValue()) {

            $table = new AdminTable($layout);

            $mediaspaceRow = (new MediaspaceDataReader())->getRowById($mediaspace->getValue());

            $customMetadataReader = new CustomMetadataJsonReader();
            $customMetadataReader->subdomain = $mediaspaceRow->url;
            $customMetadataReader->apiKey = $mediaspaceRow->apiKey;

            (new AdminTableHeader($table))
                ->addText('Id')
                ->addText('Name')
                ->addText('Type')
                ->addText('Option');

            foreach ($customMetadataReader->getData() as $customMetadataItem) {

                $row = new AdminTableRow($table);

                $row
                    ->addText($customMetadataItem->id)
                    ->addText($customMetadataItem->name)
                    ->addText($customMetadataItem->type);

                $ul = new AdminUnorderedList($row);

                foreach ($customMetadataItem->getOptionList() as $option) {
                    $ul->addText($option->id . ' - ' . $option->name);
                }

            }

        }

        return parent::getContent();
    }

}