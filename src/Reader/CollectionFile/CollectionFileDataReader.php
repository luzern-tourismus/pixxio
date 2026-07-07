<?php

namespace LuzernTourismus\Pixxio\Reader\CollectionFile;

use LuzernTourismus\Pixxio\Data\CollectionFile\CollectionFileReader;

class CollectionFileDataReader extends CollectionFileReader
{

    public function filterByCollectionId($collectionId)
    {

        $this->filter->andEqual($this->model->collectionId, $collectionId);
        return $this;

    }

}