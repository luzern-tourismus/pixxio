<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\Form\MediaspaceForm;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;

class MediaspacePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        new MediaspaceForm($layout);


        $table = new AdminTable($layout);

        $reader = new MediaspaceReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->mediaspace->label)
            ->addText($reader->model->url->label)
            ->addText($reader->model->apiKey->label);


        foreach ($reader->getData() as $mediaspaceRow) {

            (new AdminTableRow($table))
                ->addText($mediaspaceRow->mediaspace)
                ->addText($mediaspaceRow->url)
                ->addText($mediaspaceRow->apiKey);

        }



        return parent::getContent();
    }
}