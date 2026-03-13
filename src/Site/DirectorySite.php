<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\DirectoryPage;
use Nemundo\Web\Site\AbstractSite;

class DirectorySite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Directory';
        $this->url = 'directory';
    }

    public function loadContent()
    {
        (new DirectoryPage())->render();
    }
}