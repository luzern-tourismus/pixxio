<?php

namespace LuzernTourismus\Pixxio\Reader\Comment;

use LuzernTourismus\Pixxio\Data\Comment\CommentPaginationReader;

class CommentDataPaginationReader extends CommentPaginationReader
{

    use CommentDataTrait;

    public function __construct() {
        parent::__construct();
        $this->loadModel();
    }

}