<?php

namespace LuzernTourismus\Pixxio\Reader\CustomMetadata;

use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataReader;
use Nemundo\Core\Check\ValueCheck;

class CustomMetadataDataReader extends CustomMetadataReader
{

    public function __construct()
    {

        parent::__construct();
        $this->model->loadMediaspace()->loadType();

    }


    public function filterByActive()
    {

        $this->filter->andEqual($this->model->active, true);
        return $this;

    }

    public function filterByMediaspaceId($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->mediaspaceId, $mediaspaceId);
        }
        return $this;
    }


    public function orderByName()
    {

        $this->addOrder($this->model->name);
        return $this;

    }


}