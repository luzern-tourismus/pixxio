<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WebhookModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $actionName;

/**
* @var string
*/
public $fileId;

public function __construct() {
parent::__construct();
$this->model = new WebhookModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$this->typeValueList->setModelValue($this->model->actionName, $this->actionName);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$id = parent::save();
return $id;
}
}