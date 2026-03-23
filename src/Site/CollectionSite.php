<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\CollectionPage;
use Nemundo\Web\Site\AbstractSite;

class CollectionSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Collection';
        $this->url = 'collection';
    }

    public function loadContent()
    {
        (new CollectionPage())->render();
    }
}