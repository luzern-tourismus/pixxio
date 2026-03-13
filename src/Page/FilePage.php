<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\DirectoryListBox;
use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Reader\File\FileDataPaginationReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class FilePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        $directory = new DirectoryListBox($search);
        $directory->searchMode = true;
        $directory->submitOnChange = true;


        $p = new Paragraph($layout);


        $table = new AdminTable($layout);

        $reader = new FileDataPaginationReader();
        $reader->currentPage = (new PageParameter())->getValue();
        $reader
            ->filterMediaspace($mediaspace->getValue())
            ->filterDirecctory($directory->getValue());

        $p->content = $reader->getFormatTotalCount() . ' files found';

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->filename->label)
            ->addText($reader->model->mediaspace->label)
            ->addText($reader->model->directory->label);

        foreach ($reader->getData() as $fileRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($fileRow->id)
                ->addHyperlink($fileRow->fileUrl, $fileRow->filename, true)
                ->addText($fileRow->creator)
                ->addText($fileRow->directory->directory)
                ->addText($fileRow->mediaspace->mediaspace);


            $ul = new AdminUnorderedList($row);
            foreach ($fileRow->getKeywordList() as $keywordRow) {
                $ul->addText($keywordRow->keyword);
            }


        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $reader;


        return parent::getContent();
    }
}