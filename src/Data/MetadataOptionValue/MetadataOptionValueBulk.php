<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var MetadataOptionValueModel
*/
protected $model;

/**
* @var string
*/
public $metadataId;

/**
* @var string
*/
public $optionId;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->optionId, $this->optionId);
$id = parent::save();
return $id;
}
}