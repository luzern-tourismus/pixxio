<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
use Nemundo\Model\Data\AbstractModelUpdate;
class CustomMetadataOptionUpdate extends AbstractModelUpdate {
/**
* @var CustomMetadataOptionModel
*/
public $model;

/**
* @var string
*/
public $customMetadataId;

/**
* @var string
*/
public $option;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataOptionModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->customMetadataId, $this->customMetadataId);
$this->typeValueList->setModelValue($this->model->option, $this->option);
parent::update();
}
}