<?php

namespace LuzernTourismus\Pixxio\Json\Comment;

use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\DateTime\DateTime;

class CommentJsonItem extends AbstractBase
{

    public $id;

    public $comment;

    public $userId;

    /**
     * @var DateTime
     */
    public $dateTime;


}