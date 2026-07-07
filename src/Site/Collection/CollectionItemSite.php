<?php

namespace LuzernTourismus\Pixxio\Site\Collection;

use LuzernTourismus\Pixxio\Page\Collection\CollectionItemPage;
use Nemundo\Web\Site\AbstractSite;

class CollectionItemSite extends AbstractSite
{

    /**
     * @var CollectionItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'CollectionItem';
        $this->url = 'CollectionItem';
        $this->menuActive = false;

        CollectionItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new CollectionItemPage())->render();
    }
}