<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CustomMetadataOptionModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $customMetadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataRow
*/
public $customMetadata;

/**
* @var string
*/
public $option;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->customMetadataId = intval($this->getModelValue($model->customMetadataId));
if ($model->customMetadata !== null) {
$this->loadLuzernTourismusPixxioDataCustomMetadataCustomMetadatacustomMetadataRow($model->customMetadata);
}
$this->option = $this->getModelValue($model->option);
}
private function loadLuzernTourismusPixxioDataCustomMetadataCustomMetadatacustomMetadataRow($model) {
$this->customMetadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataRow($this->row, $model);
}
}