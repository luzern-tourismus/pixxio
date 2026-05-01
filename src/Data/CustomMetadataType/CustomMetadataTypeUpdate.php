<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
use Nemundo\Model\Data\AbstractModelUpdate;
class CustomMetadataTypeUpdate extends AbstractModelUpdate {
/**
* @var CustomMetadataTypeModel
*/
public $model;

/**
* @var string
*/
public $type;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->type, $this->type);
parent::update();
}
}