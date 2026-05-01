<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOption extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CustomMetadataOptionModel
*/
protected $model;

/**
* @var int
*/
public $id;

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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->customMetadataId, $this->customMetadataId);
$this->typeValueList->setModelValue($this->model->option, $this->option);
$id = parent::save();
return $id;
}
}