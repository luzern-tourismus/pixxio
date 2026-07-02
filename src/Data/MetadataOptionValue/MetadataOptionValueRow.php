<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MetadataOptionValueModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $metadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataRow
*/
public $metadata;

/**
* @var int
*/
public $optionId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionRow
*/
public $option;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->metadataId = intval($this->getModelValue($model->metadataId));
if ($model->metadata !== null) {
$this->loadLuzernTourismusPixxioDataCustomMetadataCustomMetadatametadataRow($model->metadata);
}
$this->optionId = intval($this->getModelValue($model->optionId));
if ($model->option !== null) {
$this->loadLuzernTourismusPixxioDataCustomMetadataOptionCustomMetadataOptionoptionRow($model->option);
}
}
private function loadLuzernTourismusPixxioDataCustomMetadataCustomMetadatametadataRow($model) {
$this->metadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataCustomMetadataOptionCustomMetadataOptionoptionRow($model) {
$this->option = new \LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionRow($this->row, $model);
}
}