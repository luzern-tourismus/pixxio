<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\UserPage;
use Nemundo\Web\Site\AbstractSite;

class UserSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'User';
        $this->url = 'user';
    }

    public function loadContent()
    {
        (new UserPage())->render();
    }
}