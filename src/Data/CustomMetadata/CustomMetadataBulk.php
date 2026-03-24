<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var CustomMetadataModel
*/
protected $model;

/**
* @var int
*/
public $id;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$id = parent::save();
return $id;
}
}