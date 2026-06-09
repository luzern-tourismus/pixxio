<?php

namespace LuzernTourismus\Pixxio\Reader\File;

use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use Nemundo\Core\Check\ValueCheck;

trait FileFilterTrait
{

    public function filterBySubject($subject)
    {

        if ((new ValueCheck())->hasValue($subject)) {
            $this->filter->andContains($this->model->subject, $subject);
        }
        return $this;

    }


    public function filterByMediaspaceConfig(AbstractMediaspaceConfig $mediaspace)
    {

        $this->filter->andEqual($this->model->mediaspace->apiKey, $mediaspace->apiKey);
        return $this;

    }


    public function filterByMediaspaceId($mediaspaceId)
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