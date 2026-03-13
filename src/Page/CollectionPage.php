<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Collection\Collection;
use LuzernTourismus\Pixxio\Data\Collection\CollectionReader;
use LuzernTourismus\Pixxio\Reader\Collection\CollectionDataReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;

class CollectionPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode=true;
        $mediaspace->submitOnChange=true;

        $table = new AdminTable($layout);

        $reader = new CollectionDataReader();
        $reader->filterMediaspace($mediaspace->getValue());

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->collection->label)
            ->addText($reader->model->mediaspace->label);

        foreach ($reader->getData() as $collectionRow) {

            (new AdminTableRow($table))
                ->addText($collectionRow->id)
                ->addText($collectionRow->collection)
                ->addText($collectionRow->mediaspace->mediaspace);

        }


        return parent::getContent();
    }
}