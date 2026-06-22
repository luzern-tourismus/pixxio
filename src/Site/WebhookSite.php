<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\WebhookPage;
use Nemundo\Web\Site\AbstractSite;

class WebhookSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Webhook';
        $this->url = 'webhook';
    }

    public function loadContent()
    {
        (new WebhookPage())->render();
    }
}