<?php

namespace LuzernTourismus\Pixxio\Page\File;

use LuzernTourismus\Pixxio\Com\Tab\PixxioTab;
use LuzernTourismus\Pixxio\Config\EditTypeConfig;
use LuzernTourismus\Pixxio\Data\FileMetadata\FileMetadataReader;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueReader;
use LuzernTourismus\Pixxio\Parameter\FileParameter;
use LuzernTourismus\Pixxio\Reader\Comment\CommentDataReader;
use LuzernTourismus\Pixxio\Reader\File\FileDataReader;
use Nemundo\Admin\Com\Html\AdminUnorderedList;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Html\Formatting\Strike;
use Nemundo\Html\Image\Img;

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

        $img = new Img($layout);
        $img->src = $fileRow->previewUrl;
        $img->width = 900;

        (new AdminLabelValueTable($layout))
            ->addLabelValue($fileRow->model->id->label, $fileRow->id)
            ->addLabelValue($fileRow->model->filename->label, $fileRow->filename)
            ->addLabelValue($fileRow->model->fileSize->label, $fileRow->fileSize)
            ->addLabelValue($fileRow->model->fileExtension->label, $fileRow->fileExtension)
            ->addLabelValue($fileRow->model->subject->label, $fileRow->subject)
            ->addLabelValue($fileRow->model->description->label, $fileRow->description)
            ->addLabelValue($fileRow->model->creator->label, $fileRow->creator)
            ->addLabelValue($fileRow->model->directory->label, $fileRow->directory->directory)
            ->addLabelValue($fileRow->model->description->label, $fileRow->description)
            ->addLabelHyperlink($fileRow->model->fileUrl->label, $fileRow->fileUrl)
            ->addLabelHyperlink($fileRow->model->fileUrl->label, $fileRow->getPixxioUrl());


        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Metadata';

        $table = new AdminTable($layout);

        $metadataReader = new FileMetadataReader();
        $metadataReader->model->loadMetadata();
        $metadataReader->model->metadata->loadType();
        $metadataReader->filter->andEqual($metadataReader->model->fileId, $fileId);

        (new AdminTableHeader($table))
            ->addText($metadataReader->model->metadata->id->label)
            ->addText($metadataReader->model->metadata->label)
            ->addText($metadataReader->model->metadata->type->label)
            ->addText('Value');

        foreach ($metadataReader->getData() as $metadataRow) {

            $row = new AdminTableRow($table);

            $row
                //->addText($metadataRow->id)
                ->addText($metadataRow->metadataId)
                //->addText($metadataRow->metadata->id)
                ->addText($metadataRow->metadata->name)

                //->addText($metadataRow->metadata->typeId)
                ->addText($metadataRow->metadata->type->type);

            if ($metadataRow->metadata->type->type === EditTypeConfig::TEXT) {
                $row->addText($metadataRow->value);
            } else {


            //if ($metadataRow->metadata->type->type === EditTypeConfig::MULTISELECTION) {
                $ul = new AdminUnorderedList($row);

                $metadataOptionValueReader = new MetadataOptionValueReader();
                $metadataOptionValueReader->model->loadOption();
                $metadataOptionValueReader->filter->andEqual($metadataOptionValueReader->model->fileId, $fileId);
                $metadataOptionValueReader->filter->andEqual($metadataOptionValueReader->model->metadataId, $metadataRow->metadata->id);
                foreach ($metadataOptionValueReader->getData() as $metadataOptionValueRow) {

                    $value = $metadataOptionValueRow->option->option . ' (' . $metadataOptionValueRow->optionId . ')';

                    if ($metadataOptionValueRow->active) {
                        $ul->addText($value);
                    } else {
                        $strike = new Strike($ul);
                        $strike->content = $value;
                    }



                    //$ul->addText($metadataOptionValueRow->option->option . ' (' . $metadataOptionValueRow->optionId . ')');

                }

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


        $copy = new AdminLargeTextBox($layout);
        $copy->label = 'Json';
        $copy->value = $fileRow->json;




        return parent::getContent();
    }
}