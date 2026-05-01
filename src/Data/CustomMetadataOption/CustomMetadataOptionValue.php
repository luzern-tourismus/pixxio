<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CustomMetadataOptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataOptionModel();
}
}