<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MetadataOptionValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
}