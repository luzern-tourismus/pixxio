<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
use Nemundo\Model\Data\AbstractModelUpdate;
class MetadataOptionValueUpdate extends AbstractModelUpdate {
/**
* @var MetadataOptionValueModel
*/
public $model;

/**
* @var string
*/
public $metadataId;

/**
* @var string
*/
public $optionId;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $importStatus;

/**
* @var string
*/
public $fileId;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->optionId, $this->optionId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
parent::update();
}
}