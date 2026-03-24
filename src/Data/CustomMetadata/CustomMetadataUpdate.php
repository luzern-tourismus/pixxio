<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
use Nemundo\Model\Data\AbstractModelUpdate;
class CustomMetadataUpdate extends AbstractModelUpdate {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
public function update() {
parent::update();
}
}