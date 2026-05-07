<?php
namespace LuzernTourismus\Pixxio\Data\Job;
class JobBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var JobModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $fileId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $createDateTime;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $modifyDateTime;

/**
* @var bool
*/
public $isDuplicate;

/**
* @var string
*/
public $json;

/**
* @var bool
*/
public $success;

public function __construct() {
parent::__construct();
$this->model = new JobModel();
$this->createDateTime = new \Nemundo\Core\Type\DateTime\DateTime();
$this->modifyDateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
if ($this->createDateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->createDateTime, $this->typeValueList);
$property->setValue($this->createDateTime);
}
if ($this->modifyDateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->modifyDateTime, $this->typeValueList);
$property->setValue($this->modifyDateTime);
}
$this->typeValueList->setModelValue($this->model->isDuplicate, $this->isDuplicate);
$this->typeValueList->setModelValue($this->model->json, $this->json);
$this->typeValueList->setModelValue($this->model->success, $this->success);
$id = parent::save();
return $id;
}
}