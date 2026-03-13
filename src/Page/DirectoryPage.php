<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class DirectoryPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        $p = new Paragraph($layout);

        $table = new AdminTable($layout);

        $reader = new DirectoryDataReader();
        $reader->filterMediaspace($mediaspace->getValue());

        $p->content = $reader->getTotalCount() . ' directories found';

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->directory->label)
            ->addText($reader->model->mediaspace->label);

        foreach ($reader->getData() as $collectionRow) {

            (new AdminTableRow($table))
                ->addText($collectionRow->id)
                ->addText($collectionRow->directory)
                ->addText($collectionRow->mediaspace->mediaspace);

        }

        return parent::getContent();
    }
}