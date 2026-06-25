<?php

namespace LuzernTourismus\Pixxio\Reader\File;

use LuzernTourismus\Pixxio\Data\File\FileRow;
use LuzernTourismus\Pixxio\Data\FileKeyword\FileKeywordReader;
use LuzernTourismus\Pixxio\Data\Keyword\KeywordRow;
use LuzernTourismus\Pixxio\Parameter\FileParameter;
use LuzernTourismus\Pixxio\Site\File\FileItemSite;

class FileDataRow extends FileRow
{

    public function getKeywordList()
    {

        /** @var KeywordRow $list */
        $list = [];

        $reader = new FileKeywordReader();
        $reader->model->loadKeyword();
        $reader->filter->andEqual($reader->model->fileId, $this->id);
        foreach ($reader->getData() as $fileKeywordRow) {
            $list[] = $fileKeywordRow->keyword;
        }

        return $list;

    }


    public function getSite()
    {

        $site = clone(FileItemSite::$site);
        $site->addParameter(new FileParameter($this->id));
        //$site->title = $this->id . ' ' . $this->filename;
        $site->title = $this->filename;

        return $site;

    }

}