<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MetadataOptionValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
}