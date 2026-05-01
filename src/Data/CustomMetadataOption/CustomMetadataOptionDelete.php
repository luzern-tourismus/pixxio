<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CustomMetadataOptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataOptionModel();
}
}