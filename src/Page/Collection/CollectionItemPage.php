<?php

namespace LuzernTourismus\Pixxio\Page\Collection;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Com\Table\FileTable;
use LuzernTourismus\Pixxio\Data\CollectionFile\CollectionFileReader;
use LuzernTourismus\Pixxio\Parameter\CollectionParameter;
use LuzernTourismus\Pixxio\Reader\Collection\CollectionDataReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class CollectionItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $collectionId = (new CollectionParameter())->getValue();
        $collectionRow = (new CollectionDataReader())->getRowById($collectionId);

        $title = new AdminTitle($layout);
        $title->content = $collectionRow->collection;

        $table = new FileTable($layout);

        $reader = new CollectionFileReader();
        $reader->model->loadFile();
        $reader->model->file->loadDirectory()->loadMediaspace();
        $reader->filter->andequal($reader->model->collectionId, $collectionId);
        foreach ($reader->getData() as $collectionFileRow) {
            $table->addRow($collectionFileRow->file);
        }


        return parent::getContent();
    }
}