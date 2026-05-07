<?php
namespace LuzernTourismus\Pixxio\Data\Job;
use Nemundo\Model\Data\AbstractModelUpdate;
class JobUpdate extends AbstractModelUpdate {
/**
* @var JobModel
*/
public $model;

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
public function update() {
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
parent::update();
}
}