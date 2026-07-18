<?php

namespace LuzernTourismus\Pixxio\Page\File;

use LuzernTourismus\Pixxio\Com\ListBox\DirectoryListBox;
use LuzernTourismus\Pixxio\Com\ListBox\MediaspaceListBox;
use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Reader\File\FileDataPaginationReader;
use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\ListBox\AdminCheckBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Core\Text\BoldText;
use Nemundo\Html\Paragraph\Paragraph;

class FilePage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $search = new AdminSearchForm($layout);

        $id = new AdminTextBox($search);
        $id->label = 'Id';
        $id->searchMode = true;


        $subject = new AdminTextBox($search);
        $subject->label = 'Subject';
        $subject->searchMode = true;


        $mediaspace = new MediaspaceListBox($search);
        $mediaspace->searchMode = true;
        $mediaspace->submitOnChange = true;

        $directory = new DirectoryListBox($search);
        $directory->searchMode = true;
        $directory->submitOnChange = true;

        $active = new AdminCheckBox($search);
        $active->label = 'Active';
        $active->searchMode = true;
        $active->submitOnChange = true;

        new AdminSearchButton($search);

        $p = new Paragraph($layout);

        $bold = new BoldText();
        $bold->addKeyword($subject->getValue());


        $table = new AdminTable($layout);

        $reader = new FileDataPaginationReader();
        $reader->currentPage = (new PageParameter())->getValue();
        $reader
            ->filterById($id->getValue())
            ->filterBySubject($subject->getValue())
            ->filterByMediaspaceId($mediaspace->getValue())
            ->filterDirecctory($directory->getValue());

        if ($active->getValue()) {
            $reader->filterByActive();
        }

        $p->content = $reader->getFormatTotalCount() . ' files found';

        (new AdminTableHeader($table))
            ->addText($reader->model->id->label)
            ->addText($reader->model->active->label)
            ->addText($reader->model->filename->label)
            ->addText($reader->model->fileExtension->label)
            ->addText($reader->model->fileSize->label)
            ->addText($reader->model->subject->label)
            ->addText($reader->model->description->label)
            ->addText($reader->model->creator->label)
            ->addText($reader->model->directory->label)
            ->addText($reader->model->directory->label . ' List')
            ->addText($reader->model->mediaspace->label)
            ->addText('Keyword');

        foreach ($reader->getData() as $fileRow) {

            $row = new AdminTableRow($table);

            $row
                ->addText($fileRow->id)
                ->addYesNo($fileRow->active)
                ->addSite($fileRow->getSite())
                ->addText($fileRow->fileExtension)
                ->addText($fileRow->fileSize)
                ->addText($bold->getBoldText($fileRow->subject))
                ->addText($fileRow->description)
                ->addText($fileRow->creator)
                ->addText($fileRow->directory->directory);

            $ul = new AdminUnorderedList($row);
            foreach ($fileRow->directory->getParentDirectoryList() as $parentDirectoryRow) {
                $ul->addText($parentDirectoryRow->directory);
            }

            $row->addText($fileRow->mediaspace->url);

            $ul = new AdminUnorderedList($row);
            foreach ($fileRow->getKeywordList() as $keywordRow) {
                $ul->addText($keywordRow->keyword);
            }

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $reader;

        return parent::getContent();
    }

}