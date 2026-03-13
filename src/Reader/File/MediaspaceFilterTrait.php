<?php

namespace LuzernTourismus\Pixxio\Reader\File;

use Nemundo\Core\Check\ValueCheck;

trait MediaspaceFilterTrait
{


    public function filterMediaspace($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->mediaspaceId, $mediaspaceId);
        }

        return $this;


    }


    public function filterDirecctory($directoryId)
    {

        if ((new ValueCheck())->hasValue($directoryId)) {
            $this->filter->andEqual($this->model->directoryId, $directoryId);
        }

        return $this;


    }


    protected function loadModel()
    {

        $this->model
            ->loadMediaspace()
        ->loadDirectory();

    }


}