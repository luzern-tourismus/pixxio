<?php

namespace LuzernTourismus\Pixxio\Reader\Comment;

use LuzernTourismus\Pixxio\Data\Comment\CommentReader;

class CommentDataReader extends CommentReader
{


    public function __construct() {
        parent::__construct();
        $this->model
            ->loadFile()
            ->loadUser();
    }



    public function filterByFileId($fileId)
    {
        $this->model->loadFile();
        $this->filter->andEqual($this->model->fileId, $fileId);
        return $this;
    }

}