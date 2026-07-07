<?php

namespace LuzernTourismus\Pixxio\Reader\Collection;

use Nemundo\Core\Check\ValueCheck;

trait CollectionFilterTrait
{


    public function filterByActive()
    {

        $this->filter->andEqual($this->model->active, true);
        return $this;

    }


    public function filterMediaspace($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->mediaspaceId, $mediaspaceId);
        }

        return $this;


    }


}