<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionReader;
use LuzernTourismus\Pixxio\Reader\CustomMetadata\CustomMetadataDataReader;
use LuzernTourismus\Pixxio\Reader\Mediaspace\MediaspaceDataReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Type\Number\YesNo;

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
            $customMetadataReader->filter->andEqual($customMetadataReader->model->mediaspaceId, $mediaspaceRow->id);

            (new AdminTableHeader($table))
                ->addText($customMetadataReader->model->id->label)
                ->addText($customMetadataReader->model->active->label)
                ->addText($customMetadataReader->model->name->label)
                ->addText($customMetadataReader->model->type->label)
                ->addText('Option');

            foreach ($customMetadataReader->getData() as $customMetadataRow) {

                $row = new AdminTableRow($table);

                $row
                    ->addText($customMetadataRow->id)
                    ->addYesNo($customMetadataRow->active)
                    ->addText($customMetadataRow->name)
                    ->addText($customMetadataRow->type->type);

                $ul = new AdminUnorderedList($row);

                $optionReader = new CustomMetadataOptionReader();
                $optionReader->filter->andEqual($optionReader->model->customMetadataId, $customMetadataRow->id);
                foreach ($optionReader->getData() as $optionRow) {
                    $ul->addText((new YesNo($optionRow->active))->getValue() . ': ' . $optionRow->id . ' - ' . $optionRow->option);
                }

            }

        }

        return parent::getContent();

    }

}