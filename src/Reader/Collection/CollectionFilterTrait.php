<?php

namespace LuzernTourismus\Pixxio\Reader\Collection;

use Nemundo\Core\Check\ValueCheck;

trait CollectionFilterTrait
{


    public function searchByCollection($collection)
    {

        if ((new ValueCheck())->hasValue($collection)) {
            $this->filter->andContains($this->model->collection, $collection);
        }
        return $this;

    }


    public function filterByActive()
    {

        $this->filter->andEqual($this->model->active, true);
        return $this;

    }


    public function filterByMediaspace($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->mediaspaceId, $mediaspaceId);
        }

        return $this;

    }


    public function filterByUser($userId)
    {

        if ((new ValueCheck())->hasValue($userId)) {
            $this->filter->andEqual($this->model->userId, $userId);
        }

        return $this;

    }

}