<?php

namespace LuzernTourismus\Pixxio\Com\Table;

use LuzernTourismus\Pixxio\Data\Collection\CollectionModel;
use LuzernTourismus\Pixxio\Data\File\FileModel;
use LuzernTourismus\Pixxio\Reader\File\FileDataRow;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;

class FileTable extends AdminTable
{
    
    public function getContent() {

        $model = new FileModel();
        $model
            ->loadDirectory()
        ->loadMediaspace();

        (new AdminTableHeader($this))
            ->addText($model->id->label)
            ->addText($model->active->label)
            ->addText($model->filename->label)
            ->addText($model->fileExtension->label)
            ->addText($model->fileSize->label)
            ->addText($model->subject->label)
            ->addText($model->description->label)
            ->addText($model->creator->label)
            ->addText($model->directory->label)
            ->addText($model->directory->label.' List')
            ->addText($model->mediaspace->label)
            ->addText('Keyword');
        
        
        return parent::getContent();
        
    }


    public function addRow(FileDataRow $fileRow)
    {

        $row = new AdminTableRow($this);

        $row
            ->addText($fileRow->id)
            ->addYesNo($fileRow->active)
            ->addSite($fileRow->getSite())
            //->addHyperlink($fileRow->fileUrl, $fileRow->filename, true)
            ->addText($fileRow->fileExtension)
            ->addText($fileRow->fileSize)
            ->addText($fileRow->subject)
            //->addText($bold->getBoldText($fileRow->subject))
            ->addText($fileRow->description)
            ->addText($fileRow->creator)
            //->addText($fileRow->directory->id)
            ->addText($fileRow->directory->directory);

        $ul = new AdminUnorderedList($row);
        //$ul->addText($fileRow->directoryId);
        foreach ($fileRow->directory->getParentDirectoryList() as $parentDirectoryRow) {
            //$ul->addText($parentDirectoryRow->id . ' ' . $parentDirectoryRow->directory);
            $ul->addText($parentDirectoryRow->directory);
        }

        $row->addText($fileRow->mediaspace->url);

        $ul = new AdminUnorderedList($row);
        foreach ($fileRow->getKeywordList() as $keywordRow) {
            $ul->addText($keywordRow->keyword);
        }

    }
    

}