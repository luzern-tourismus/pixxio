<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\User\UserReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;

class UserPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $p = new Paragraph($layout);


        $table = new AdminTable($layout);

        $reader = new UserReader();
        //$reader->currentPage = (new PageParameter())->getValue();
        //$reader->addOrder($reader->model->createDateTime,SortOrder::DESCENDING);


        $p->content = $reader->getTotalCount() . ' users found';

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->userName->label)
            ->addText($reader->model->displayName->label);

        foreach ($reader->getData() as $userRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($userRow->id)
                ->addText($userRow->userName)
                ->addText($userRow->displayName);

        }


        return parent::getContent();
    }
}