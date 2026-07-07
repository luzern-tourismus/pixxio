<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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

/**
* @var string
*/
public $userId;

/**
* @var bool
*/
public $dynamicCollection;

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
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->dynamicCollection, $this->dynamicCollection);
$id = parent::save();
return $id;
}
}