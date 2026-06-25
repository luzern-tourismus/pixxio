<?php

namespace LuzernTourismus\Pixxio\Page;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\Comment\CommentReader;
use LuzernTourismus\Pixxio\Data\File\FileReader;
use LuzernTourismus\Pixxio\Data\File\FileRow;
use LuzernTourismus\Pixxio\Parameter\FileParameter;
use LuzernTourismus\Pixxio\Reader\Comment\CommentDataReader;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class FileItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $fileId = (new FileParameter())->getValue();
        $fileRow = (new FileReader())->getRowById($fileId);

        $title = new AdminTitle($layout);
        $title->content = $fileRow->filename;


        $table = new AdminTable($layout);

        $commentReader = new CommentDataReader();
        $commentReader->filterByFileId($fileId);
        foreach ($commentReader->getData() as $commentRow) {

            (new AdminTableRow($table))
                ->addText($commentRow->user->userName)
                ->addText($commentRow->comment);


        }









        return parent::getContent();
    }
}