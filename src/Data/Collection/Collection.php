<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class Collection extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CollectionModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $collection;

/**
* @var string
*/
public $mediaspaceId;

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
$this->model = new CollectionModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->collection, $this->collection);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$id = parent::save();
return $id;
}
}