<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FileMetadataModel
*/
protected $model;

/**
* @var string
*/
public $fileId;

/**
* @var string
*/
public $metadataId;

/**
* @var string
*/
public $value;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $importStatus;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$id = parent::save();
return $id;
}
}