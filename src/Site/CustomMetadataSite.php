<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\CustomMetadataPage;
use Nemundo\Web\Site\AbstractSite;

class CustomMetadataSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Custom Metadata';
        $this->url = 'custom-metadata';
    }

    public function loadContent()
    {
        (new CustomMetadataPage())->render();
    }
}