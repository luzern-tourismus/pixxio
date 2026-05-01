<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
use Nemundo\Model\Id\AbstractModelIdValue;
class CustomMetadataOptionId extends AbstractModelIdValue {
/**
* @var CustomMetadataOptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataOptionModel();
}
}