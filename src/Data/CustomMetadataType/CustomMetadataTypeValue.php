<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CustomMetadataTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
}