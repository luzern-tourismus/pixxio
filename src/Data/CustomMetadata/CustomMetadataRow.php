<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CustomMetadataModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow
*/
public $mediaspace;

/**
* @var string
*/
public $name;

/**
* @var int
*/
public $typeId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataTypeRow
*/
public $type;

/**
* @var bool
*/
public $importStatus;

/**
* @var bool
*/
public $active;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->mediaspaceId = intval($this->getModelValue($model->mediaspaceId));
if ($model->mediaspace !== null) {
$this->loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model->mediaspace);
}
$this->name = $this->getModelValue($model->name);
$this->typeId = intval($this->getModelValue($model->typeId));
if ($model->type !== null) {
$this->loadLuzernTourismusPixxioDataCustomMetadataTypeCustomMetadataTypetypeRow($model->type);
}
$this->importStatus = boolval($this->getModelValue($model->importStatus));
$this->active = boolval($this->getModelValue($model->active));
}
private function loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataCustomMetadataTypeCustomMetadataTypetypeRow($model) {
$this->type = new \LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataTypeRow($this->row, $model);
}
}