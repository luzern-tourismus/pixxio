<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValue extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MetadataOptionValueModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->optionId, $this->optionId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$id = parent::save();
return $id;
}
}