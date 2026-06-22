<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Site\WebhookSite;
use Nemundo\Admin\Com\Copy\AdminCopyTextBox;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;

class PixxioPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $copy = new AdminCopyTextBox($layout);
        $copy->label = 'Webhook Url';
        $copy->value = WebhookSite::$site->getUrlWithDomain();


        return parent::getContent();
    }
}