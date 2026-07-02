<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MetadataOptionValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
}