<?php

namespace LuzernTourismus\Pixxio\Reader\Directory;

use LuzernTourismus\Pixxio\Data\Directory\DirectoryRow;
use Nemundo\Core\Check\ValueCheck;

class DirectoryDataRow extends DirectoryRow
{

    /**
     * @return DirectoryRow[]
     */
    public function getParentDirectoryList()
    {

        $list = [];
        $list[] = $this;
        $parentId = $this->parentId;

        do {


            //$parentId =null;


            $found=false;

            $reader = new DirectoryDataReader();
            $reader->filter->andEqual($reader->model->id, $parentId);
            foreach ($reader->getData() as $directoryRow) {
                $list[] = $directoryRow;
                $parentId = $directoryRow->parentId;
                $found=true;
            }

            /*if (!(new ValueCheck())->hasValue($parentId)) {
                $parentId =null;
            }*/

        } while ($found);

        return $list;

    }

}