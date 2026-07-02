<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Comment\CommentReader;
use LuzernTourismus\Pixxio\Data\User\UserReader;
use LuzernTourismus\Pixxio\Reader\Comment\CommentDataPaginationReader;
use LuzernTourismus\Pixxio\Reader\Comment\CommentDataReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class CommentPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);


        $table = new AdminTable($layout);

        $reader = new CommentDataPaginationReader();
        $reader->currentPage = (new PageParameter())->getValue();
        $reader->orderByDateTime();
        //$reader->model->loadFile()->loadUser();

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->file->label)
            ->addText($reader->model->dateTime->label)
            ->addText($reader->model->user->label)
            ->addText($reader->model->comment->label);

        foreach ($reader->getData() as $userRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($userRow->id)
                ->addSite($userRow->file->getSite())
                ->addText($userRow->dateTime->getShortDateTimeLeadingZeroFormat())
                ->addText($userRow->user->userName)
                ->addText($userRow->comment);

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $reader;


        return parent::getContent();
    }
}