<?php

namespace LuzernTourismus\Pixxio\Page\Mediaspace;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Parameter\MediaspaceParameter;
use LuzernTourismus\Pixxio\Site\Mediaspace\MediaspaceDeleteSite;
use LuzernTourismus\Pixxio\Site\Mediaspace\MediaspaceEditSite;
use LuzernTourismus\Pixxio\Site\Mediaspace\MediaspaceNewSite;
use Nemundo\Admin\Com\Button\AdminIconSiteButton;
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

        //new MediaspaceForm($layout);

        $btn = new AdminIconSiteButton($layout);
        $btn->site = MediaspaceNewSite::$site;


        $table = new AdminTable($layout);

        $reader = new MediaspaceReader();

        (new AdminTableHeader($table))
            //->addText($reader->model->mediaspace->label)
            ->addText($reader->model->url->label)
            ->addText($reader->model->apiKey->label)
            ->addEmpty(2);


        foreach ($reader->getData() as $mediaspaceRow) {

            $editSite = clone(MediaspaceEditSite::$site);
            $editSite->addParameter(new MediaspaceParameter($mediaspaceRow->id));

            $deleteSite = clone(MediaspaceDeleteSite::$site);
            $deleteSite->addParameter(new MediaspaceParameter($mediaspaceRow->id));


            (new AdminTableRow($table))
                //->addText($mediaspaceRow->mediaspace)
                ->addText($mediaspaceRow->url)
                ->addText($mediaspaceRow->apiKey)
                ->addIconSite($editSite)
                ->addIconSite($deleteSite);

        }


        return parent::getContent();
    }
}