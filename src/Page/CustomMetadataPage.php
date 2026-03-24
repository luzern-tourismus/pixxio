<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader;
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

            $reader = new CustomMetadataJsonReader();
            $reader->subdomain = $mediaspaceRow->url;
            $reader->apiKey = $mediaspaceRow->apiKey;

            (new AdminTableHeader($table))
                ->addText('Id')
                ->addText('Name')
                ->addText('Type')
                ->addText('Option');

            foreach ($reader->getData() as $customMetadataItem) {

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