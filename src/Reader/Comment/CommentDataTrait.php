<?php

namespace LuzernTourismus\Pixxio\Reader\Comment;

use Nemundo\Db\Sql\Order\SortOrder;

trait CommentDataTrait
{

   protected function loadModel() {
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


    public function orderByDateTime()
    {
        $this->addOrder($this->model->dateTime, SortOrder::DESCENDING);
        return $this;
    }



}