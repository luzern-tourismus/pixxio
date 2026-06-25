<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Webhook\WebhookReader;
use LuzernTourismus\Pixxio\Reader\Webhook\WebhookDataReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Db\Sql\Order\SortOrder;

class WebhookPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);


        $table = new AdminTable($layout);

        $reader = new WebhookDataReader();
        $reader->addOrder($reader->model->dateTime,SortOrder::DESCENDING);

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->dateTime->label)
            ->addText($reader->model->actionName->label)
            ->addText($reader->model->file->label)
            ->addEmpty();


        foreach ($reader->getData() as $mediaspaceRow) {


            $url = 'https://pixxio.luzern.com/media/' . $mediaspaceRow->fileId . '/comments';

            (new AdminTableRow($table))
                ->addText($mediaspaceRow->id)
                ->addText($mediaspaceRow->dateTime->getShortDateTimeLeadingZeroFormat())
                ->addText($mediaspaceRow->actionName)
                ->addSite($mediaspaceRow->file->getSite())
                ->addHyperlink($url, 'Comments');

        }


        return parent::getContent();
    }
}