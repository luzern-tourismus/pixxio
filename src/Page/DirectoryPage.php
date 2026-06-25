<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
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
            ->addText($reader->model->active->label)
            ->addText($reader->model->directory->label)
            ->addText($reader->model->parent->label)
            ->addText($reader->model->quantity->label)
            ->addText($reader->model->mediaspace->label);

        foreach ($reader->getData() as $directoryRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($directoryRow->id)
                ->addYesNo($directoryRow->active)
                ->addText($directoryRow->directory);

            $ul = new AdminUnorderedList($row);
            foreach ($directoryRow->getParentDirectoryList() as $directoryRow2) {
                $ul->addText($directoryRow2->directory);
            }

            $row
                ->addText($directoryRow->quantity)
                ->addText($directoryRow->mediaspace->url);

        }

        return parent::getContent();

    }

}