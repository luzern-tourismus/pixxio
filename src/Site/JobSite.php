<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\JobPage;
use Nemundo\Web\Site\AbstractSite;

class JobSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Job';
        $this->url = 'job';
    }

    public function loadContent()
    {
        (new JobPage())->render();
    }
}