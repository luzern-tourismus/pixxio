<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
use Nemundo\Model\Id\AbstractModelIdValue;
class CustomMetadataId extends AbstractModelIdValue {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
}