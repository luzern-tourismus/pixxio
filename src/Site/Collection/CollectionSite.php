<?php

namespace LuzernTourismus\Pixxio\Site\Collection;

use LuzernTourismus\Pixxio\Page\Collection\CollectionPage;
use Nemundo\Web\Site\AbstractSite;

class CollectionSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Collection';
        $this->url = 'collection';

        new CollectionItemSite($this);

    }

    public function loadContent()
    {
        (new CollectionPage())->render();
    }
}