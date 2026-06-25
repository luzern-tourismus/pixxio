<?php

namespace LuzernTourismus\Pixxio\Site\Comment;

use LuzernTourismus\Pixxio\Page\CommentPage;
use Nemundo\Web\Site\AbstractSite;

class CommentSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Comment';
        $this->url = 'Comment';

        new CommentImportSite($this);

    }

    public function loadContent()
    {
        (new CommentPage())->render();
    }
}