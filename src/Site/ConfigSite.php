<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\ConfigPage;
use Nemundo\Web\Site\AbstractSite;

class ConfigSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Config';
        $this->url = 'config';
    }

    public function loadContent()
    {
        (new ConfigPage())->render();
    }
}