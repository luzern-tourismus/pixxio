<?php

namespace LuzernTourismus\Pixxio\Page\File;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Data\FileMetadata\FileMetadataReader;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueReader;
use LuzernTourismus\Pixxio\Parameter\FileParameter;
use LuzernTourismus\Pixxio\Reader\Comment\CommentDataReader;
use LuzernTourismus\Pixxio\Reader\File\FileDataReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;

class FileItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new PixxioTab($layout);

        $fileId = (new FileParameter())->getValue();
        $fileRow = (new FileDataReader())->getRowById($fileId);

        $title = new AdminTitle($layout);
        $title->content = $fileRow->filename;


        (new AdminLabelValueTable($layout))
            ->addLabelValue($fileRow->model->filename->label, $fileRow->filename)
            ->addLabelValue($fileRow->model->fileSize->label, $fileRow->fileSize)
            ->addLabelValue($fileRow->model->fileExtension->label, $fileRow->fileExtension)
            ->addLabelValue($fileRow->model->subject->label, $fileRow->subject)
            ->addLabelValue($fileRow->model->description->label, $fileRow->description)
            ->addLabelValue($fileRow->model->creator->label, $fileRow->creator)
            ->addLabelValue($fileRow->model->directory->label, $fileRow->directory->directory)
            ->addLabelValue($fileRow->model->description->label, $fileRow->description);


        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Metadata';

        $table = new AdminTable($layout);

        $metadataReader = new FileMetadataReader();
        $metadataReader->model->loadMetadata();
        $metadataReader->model->metadata->loadType();
        $metadataReader->filter->andEqual($metadataReader->model->fileId, $fileId);

        (new AdminTableHeader($table))
            ->addText($metadataReader->model->metadata->label)
            ->addText($metadataReader->model->metadata->type->label)
            ->addText('Value');

        foreach ($metadataReader->getData() as $metadataRow) {

            $row = new AdminTableRow($table);

            $row->addText($metadataRow->metadata->name)
                ->addText($metadataRow->metadata->type->type);

            $ul = new AdminUnorderedList($row);

            $metadataOptionValueReader = new MetadataOptionValueReader();
            $metadataOptionValueReader->model->loadOption();
            $metadataOptionValueReader->filter->andEqual($metadataOptionValueReader->model->metadataId, $metadataRow->metadata->id);
            foreach ($metadataOptionValueReader->getData() as $metadataOptionValueRow) {
                $ul->addText($metadataOptionValueRow->option->option . ' (' . $metadataOptionValueRow->optionId . ')');
            }


        }


        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Comment';


        $table = new AdminTable($layout);

        $commentReader = new CommentDataReader();
        $commentReader->filterByFileId($fileId);
        foreach ($commentReader->getData() as $commentRow) {

            (new AdminTableRow($table))
                ->addText($commentRow->user->userName)
                ->addText($commentRow->comment);


        }

        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Keyword';


        $ul = new AdminUnorderedList($layout);
        foreach ($fileRow->getKeywordList() as $keywordRow) {
            $ul->addText($keywordRow->keyword);
        }


        return parent::getContent();
    }
}