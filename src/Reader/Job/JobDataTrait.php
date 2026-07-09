<?php

namespace LuzernTourismus\Pixxio\Reader\Job;

use Nemundo\Core\Check\ValueCheck;

trait JobDataTrait
{

    public function filterByJobId($jobId)
    {

        if ((new ValueCheck())->hasValue($jobId)) {
            $this->filter->andEqual($this->model->id, $jobId);
        }

        return $this;

    }


    public function filterByFileId($fileId)
    {

        if ((new ValueCheck())->hasValue($fileId)) {
            $this->filter->andEqual($this->model->fileId, $fileId);
        }

        return $this;

    }


}