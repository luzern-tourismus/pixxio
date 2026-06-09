<?php

namespace LuzernTourismus\Pixxio\Reader\Directory;

use LuzernTourismus\Pixxio\Data\Directory\DirectoryRow;

class DirectoryDataRow extends DirectoryRow
{

    /**
     * @return DirectoryRow[]
     */
    public function getParentDirectoryList()
    {

        $list = [];
        $parentId = $this->parentId;

        do {

            $reader = new DirectoryDataReader();
            $reader->filter->andEqual($reader->model->id, $parentId);
            foreach ($reader->getData() as $directoryRow) {
                $list[] = $directoryRow;
                $parentId = $directoryRow->parentId;
            }

        } while ($parentId <> 1);

        return $list;

    }

}