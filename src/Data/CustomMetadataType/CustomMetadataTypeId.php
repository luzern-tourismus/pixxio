<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
use Nemundo\Model\Id\AbstractModelIdValue;
class CustomMetadataTypeId extends AbstractModelIdValue {
/**
* @var CustomMetadataTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
}