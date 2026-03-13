<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\MediaspacePage;
use Nemundo\Web\Site\AbstractSite;

class MediaspaceSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Mediaspace';
        $this->url = 'Mediaspace';
    }

    public function loadContent()
    {
        (new MediaspacePage())->render();
    }
}