<?php

namespace LuzernTourismus\Pixxio\Site\Mediaspace;

use LuzernTourismus\Pixxio\Page\Mediaspace\MediaspacePage;
use Nemundo\Web\Site\AbstractSite;

class MediaspaceSite extends AbstractSite
{

    /**
     * @var MediaspaceSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Mediaspace';
        $this->url = 'mediaspace';

        MediaspaceSite::$site = $this;

        new MediaspaceNewSite($this);
        new MediaspaceEditSite($this);
        new MediaspaceDeleteSite($this);


    }

    public function loadContent()
    {
        (new MediaspacePage())->render();
    }
}