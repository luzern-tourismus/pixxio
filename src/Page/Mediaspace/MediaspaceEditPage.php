<?php

namespace LuzernTourismus\Pixxio\Page\Mediaspace;

use LuzernTourismus\Pixxio\Com\Form\MediaspaceForm;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Parameter\MediaspaceParameter;
use LuzernTourismus\Pixxio\Site\Mediaspace\MediaspaceNewSite;
use LuzernTourismus\Pixxio\Site\Mediaspace\MediaspaceSite;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;

class MediaspaceEditPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $form = new MediaspaceForm($layout);
        $form->dataId = (new MediaspaceParameter())->getValue();
        $form->redirectSite = MediaspaceSite::$site;

        return parent::getContent();
    }
}