<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CustomMetadataTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
}