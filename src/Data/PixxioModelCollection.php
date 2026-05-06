<?php
namespace LuzernTourismus\Pixxio\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PixxioModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \LuzernTourismus\Pixxio\Data\Collection\CollectionModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataTypeModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\Directory\DirectoryModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\File\FileModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\FileKeyword\FileKeywordModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\Job\JobModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\Keyword\KeywordModel());
$this->addModel(new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceModel());
}
}