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

/**
* @var string
*/
public $mediaspaceId;

/**
* @var string
*/
public $name;

/**
* @var string
*/
public $typeId;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->name, $this->name);
$this->typeValueList->setModelValue($this->model->typeId, $this->typeId);
$id = parent::save();
return $id;
}
}