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

public function __construct() {
parent::__construct();
$this->model = new CollectionModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->collection, $this->collection);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$id = parent::save();
return $id;
}
}