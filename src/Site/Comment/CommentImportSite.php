<?php

namespace LuzernTourismus\Pixxio\Site\Comment;

use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceId;
use LuzernTourismus\Pixxio\Page\CommentPage;
use LuzernTourismus\Pixxio\Parameter\FileParameter;
use Nemundo\Web\Site\AbstractSite;

class CommentImportSite extends AbstractSite
{

    /**
     * @var CommentImportSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Comment Import';
        $this->url = 'comment-import';

        CommentImportSite::$site = $this;

    }

    public function loadContent()
    {

        $id = new MediaspaceId();
        $id->filter->andEqual($id->model->url, 'luzern-tourismus');
        $mediaspaceId = $id->getId();


        $fileId = (new FileParameter())->getValue();




    }
}