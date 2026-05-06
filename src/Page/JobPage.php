<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\DirectoryListBox;
use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Job\JobPaginationReader;
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
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class JobPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $p = new Paragraph($layout);


        $table = new AdminTable($layout);

        $reader = new JobPaginationReader();
        $reader->currentPage = (new PageParameter())->getValue();
        $reader->addOrder($reader->model->createDateTime,SortOrder::DESCENDING);


        $p->content = $reader->getFormatTotalCount() . ' files found';

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->fileId->label)
            ->addText($reader->model->isDuplicate->label)
            ->addText($reader->model->createDateTime->label)
            ->addText($reader->model->modifyDateTime->label)
            ->addText($reader->model->json->label);

        foreach ($reader->getData() as $fileRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($fileRow->id)
                ->addText($fileRow->fileId)
                ->addYesNo($fileRow->isDuplicate)
                ->addText($fileRow->createDateTime->getShortDateTimeLeadingZeroFormat())
                ->addText($fileRow->modifyDateTime->getShortDateTimeLeadingZeroFormat())
                ->addText($fileRow->json);

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $reader;


        return parent::getContent();
    }
}