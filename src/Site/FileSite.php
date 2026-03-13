<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\FilePage;
use Nemundo\Web\Site\AbstractSite;

class FileSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'File';
        $this->url = 'file';
    }

    public function loadContent()
    {
        (new FilePage())->render();
    }
}