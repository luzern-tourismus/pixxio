<?php

namespace LuzernTourismus\Pixxio\Page\Collection;

use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\ListBox\UserListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Parameter\CollectionParameter;
use LuzernTourismus\Pixxio\Reader\Collection\CollectionDataReader;
use LuzernTourismus\Pixxio\Site\Collection\CollectionItemSite;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Paragraph\Paragraph;


class CollectionPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $search = new AdminSearchForm($layout);

        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        $user = new UserListBox($search);
        $user->searchMode = true;
        $user->submitOnChange = true;

        $p = new Paragraph($layout);


        $table = new AdminTable($layout);

        $reader = new CollectionDataReader();
        $reader
            ->filterByMediaspace($mediaspace->getValue())
            ->filterByUser($user->getValue());

        $p->content = $reader->getTotalCount() . ' collections found';

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->active->label)
            ->addText($reader->model->collection->label)
            ->addText($reader->model->user->label)
            ->addText($reader->model->mediaspace->label);

        foreach ($reader->getData() as $collectionRow) {

            $site = clone(CollectionItemSite::$site);
            $site->addParameter(new CollectionParameter($collectionRow->id));
            $site->title = $collectionRow->collection;

            (new AdminTableRow($table))
                ->addText($collectionRow->id)
                ->addyesNo($collectionRow->active)
                ->addsite($site)
                ->addText($collectionRow->user->userName)
                ->addText($collectionRow->mediaspace->url);

        }


        return parent::getContent();
    }
}