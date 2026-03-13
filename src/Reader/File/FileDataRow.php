<?php

namespace LuzernTourismus\Pixxio\Reader\File;

use LuzernTourismus\Pixxio\Data\File\FileRow;
use LuzernTourismus\Pixxio\Data\FileKeyword\FileKeywordReader;
use LuzernTourismus\Pixxio\Data\Keyword\KeywordRow;


// LuzernTourismus\Pixxio\Reader\File\FileDataRow

class FileDataRow extends FileRow
{

    public function getKeywordList()
    {

        /** @var KeywordRow $list */
        $list=[];

        $reader = new FileKeywordReader();
        $reader->model->loadKeyword();
        $reader->filter->andEqual($reader->model->fileId,$this->id);
        foreach ($reader->getData() as $fileKeywordRow) {
            $list[] = $fileKeywordRow->keyword;
        }

        return $list;

    }

}