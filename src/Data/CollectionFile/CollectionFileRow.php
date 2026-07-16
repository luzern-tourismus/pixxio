<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CollectionFileModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $collectionId;

/**
* @var \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow
*/
public $collection;

/**
* @var int
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public $file;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $importStatus;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->collectionId = intval($this->getModelValue($model->collectionId));
if ($model->collection !== null) {
$this->loadLuzernTourismusPixxioDataCollectionCollectioncollectionRow($model->collection);
}
$this->fileId = intval($this->getModelValue($model->fileId));
if ($model->file !== null) {
$this->loadLuzernTourismusPixxioDataFileFilefileRow($model->file);
}
$this->active = boolval($this->getModelValue($model->active));
$this->importStatus = boolval($this->getModelValue($model->importStatus));
}
private function loadLuzernTourismusPixxioDataCollectionCollectioncollectionRow($model) {
$this->collection = new \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataFileFilefileRow($model) {
$this->file = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($this->row, $model);
}
}