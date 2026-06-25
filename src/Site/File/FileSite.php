<?php

namespace LuzernTourismus\Pixxio\Site\File;

use LuzernTourismus\Pixxio\Page\FilePage;
use Nemundo\Web\Site\AbstractSite;

class FileSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'File';
        $this->url = 'file';

        new FileItemSite($this);

    }

    public function loadContent()
    {
        (new FilePage())->render();
    }
}