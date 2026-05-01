<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CustomMetadataOptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataOptionModel();
}
}