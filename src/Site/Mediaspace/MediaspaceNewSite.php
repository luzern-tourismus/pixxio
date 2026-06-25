<?php

namespace LuzernTourismus\Pixxio\Site\Mediaspace;

use LuzernTourismus\Pixxio\Page\Mediaspace\MediaspaceNewPage;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Web\Site\AbstractSite;

class MediaspaceNewSite extends AbstractNewIconSite
{

    /**
     * @var MediaspaceNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New Mediaspace';
        $this->url = 'MediaspaceNew';
        $this->menuActive = false;

        MediaspaceNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new MediaspaceNewPage())->render();
    }
}