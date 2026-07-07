<?php

namespace LuzernTourismus\Pixxio\Site\Mediaspace;

use LuzernTourismus\Pixxio\Page\Mediaspace\MediaspaceEditPage;
use Nemundo\Admin\Site\AbstractEditIconSite;
use Nemundo\Web\Site\AbstractSite;

class MediaspaceEditSite extends AbstractEditIconSite
{

    /**
     * @var MediaspaceEditSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'MediaspaceEdit';
        $this->url = 'mediaspace-edit';
        $this->menuActive = false;

        MediaspaceEditSite::$site = $this;

    }

    public function loadContent()
    {
        (new MediaspaceEditPage())->render();
    }
}