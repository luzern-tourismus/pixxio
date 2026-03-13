<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var DirectoryModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $directory;

/**
* @var int
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow
*/
public $mediaspace;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->directory = $this->getModelValue($model->directory);
$this->mediaspaceId = intval($this->getModelValue($model->mediaspaceId));
if ($model->mediaspace !== null) {
$this->loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model->mediaspace);
}
}
private function loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow($this->row, $model);
}
}