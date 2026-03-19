<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\PixxioPage;
use LuzernTourismus\Pixxio\Usergroup\PixxioUsergroup;
use Nemundo\Web\Site\AbstractSite;

class PixxioSite extends AbstractSite
{

    /**
     * @var PixxioSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Pixxio';
        $this->url = 'pixxio';
        $this->restricted = true;
        $this->addRestrictedUsergroup(new PixxioUsergroup());

        PixxioSite::$site = $this;

        new MediaspaceSite($this);
        new CollectionSite($this);
        new FileSite($this);
        new KeywordSite($this);
        new DirectorySite($this);

    }

    public function loadContent()
    {
        (new PixxioPage())->render();
    }
}