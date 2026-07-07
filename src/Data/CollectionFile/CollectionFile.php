<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFile extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CollectionFileModel
*/
protected $model;

/**
* @var string
*/
public $collectionId;

/**
* @var string
*/
public $fileId;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $importStatus;

public function __construct() {
parent::__construct();
$this->model = new CollectionFileModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->collectionId, $this->collectionId);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$id = parent::save();
return $id;
}
}