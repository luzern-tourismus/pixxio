<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
use Nemundo\Model\Data\AbstractModelUpdate;
class CustomMetadataUpdate extends AbstractModelUpdate {
/**
* @var CustomMetadataModel
*/
public $model;

/**
* @var string
*/
public $mediaspaceId;

/**
* @var string
*/
public $name;

/**
* @var string
*/
public $typeId;

/**
* @var bool
*/
public $importStatus;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->typeId, $this->typeId);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->active, $this->active);
parent::update();
}
}