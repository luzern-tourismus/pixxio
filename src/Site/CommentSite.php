<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\CommentPage;
use Nemundo\Web\Site\AbstractSite;

class CommentSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Comment';
        $this->url = 'Comment';
    }

    public function loadContent()
    {
        (new CommentPage())->render();
    }
}