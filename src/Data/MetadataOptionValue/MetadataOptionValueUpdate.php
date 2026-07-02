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

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->optionId, $this->optionId);
parent::update();
}
}