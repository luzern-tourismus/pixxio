<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CustomMetadataTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
}