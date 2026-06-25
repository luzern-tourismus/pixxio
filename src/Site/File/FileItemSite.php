<?php

namespace LuzernTourismus\Pixxio\Site\File;

use LuzernTourismus\Pixxio\Page\FileItemPage;
use Nemundo\Web\Site\AbstractSite;

class FileItemSite extends AbstractSite
{


    /**
     * @var FileItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'FileItem';
        $this->url = 'FileItem';
        $this->menuActive = false;

        FileItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new FileItemPage())->render();
    }
}