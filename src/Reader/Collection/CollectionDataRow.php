<?php

namespace LuzernTourismus\Pixxio\Reader\Collection;

use LuzernTourismus\Pixxio\Data\Collection\CollectionRow;
use LuzernTourismus\Pixxio\Data\CollectionFile\CollectionFileReader;
use LuzernTourismus\Pixxio\Data\CollectionFile\CollectionFileRow;
use LuzernTourismus\Pixxio\Reader\File\FileDataRow;


// LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow

class CollectionDataRow extends CollectionRow
{


    public function getFileList()
    {

        /** @var FileDataRow[] $list */
        $list = [];

        $reader = new CollectionFileReader();
        $reader->model->loadFile();
        $reader->model->file->loadDirectory()->loadMediaspace();
        $reader->filter->andEqual($reader->model->collectionId, $this->id);
        foreach ($reader->getData() as $collectionFileRow) {
            $list[] = $collectionFileRow->file;
        }

        return $list;

    }

}