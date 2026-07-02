<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FileMetadataModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public $file;

/**
* @var int
*/
public $metadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataRow
*/
public $metadata;

/**
* @var string
*/
public $value;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fileId = intval($this->getModelValue($model->fileId));
if ($model->file !== null) {
$this->loadLuzernTourismusPixxioDataFileFilefileRow($model->file);
}
$this->metadataId = intval($this->getModelValue($model->metadataId));
if ($model->metadata !== null) {
$this->loadLuzernTourismusPixxioDataCustomMetadataCustomMetadatametadataRow($model->metadata);
}
$this->value = $this->getModelValue($model->value);
}
private function loadLuzernTourismusPixxioDataFileFilefileRow($model) {
$this->file = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataCustomMetadataCustomMetadatametadataRow($model) {
$this->metadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataRow($this->row, $model);
}
}