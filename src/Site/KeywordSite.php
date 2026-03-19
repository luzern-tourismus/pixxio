<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\KeywordPage;
use Nemundo\Web\Site\AbstractSite;

class KeywordSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Keyword';
        $this->url = 'keyword';
    }

    public function loadContent()
    {
        (new KeywordPage())->render();
    }
}