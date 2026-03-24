<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
}