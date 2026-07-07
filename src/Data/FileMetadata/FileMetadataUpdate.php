<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileMetadataUpdate extends AbstractModelUpdate {
/**
* @var FileMetadataModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
parent::update();
}
}