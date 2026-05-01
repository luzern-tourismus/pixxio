<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataType extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CustomMetadataTypeModel
*/
protected $model;

/**
* @var string
*/
public $type;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->type, $this->type);
$id = parent::save();
return $id;
}
}