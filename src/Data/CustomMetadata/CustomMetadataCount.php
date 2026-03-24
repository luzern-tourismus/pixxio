<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
}