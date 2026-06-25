<?php

namespace LuzernTourismus\Pixxio\Reader\Comment;

use LuzernTourismus\Pixxio\Data\Comment\CommentReader;

class CommentDataReader extends CommentReader
{

    public function filterByFileId($fileId)
    {
        $this->model->loadFile();
        $this->filter->andEqual($this->model->fileId, $fileId);
        return $this;
    }

}