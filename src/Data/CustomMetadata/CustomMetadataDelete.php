<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
}