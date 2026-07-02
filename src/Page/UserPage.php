<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Reader\User\UserDataReader;
use Nemundo\Admin\Com\Form\AdminSearchForm;
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

        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        $p = new Paragraph($layout);

        $table = new AdminTable($layout);

        $reader = new UserDataReader();

        $p->content = $reader->getTotalCount() . ' users found';

        (new AdminTableHeader($table))
            ->addText($reader->model->active->label)
            ->addText($reader->model->id->label)
            ->addText($reader->model->userName->label)
            ->addText($reader->model->displayName->label)
            ->addText($reader->model->mediaspace->label);

        foreach ($reader->getData() as $userRow) {

            (new AdminTableRow($table))
                ->addYesNo($userRow->active)
                ->addText($userRow->id)
                ->addText($userRow->userName)
                ->addText($userRow->displayName)
                ->addText($userRow->mediaspace->url);

        }

        return parent::getContent();

    }
}