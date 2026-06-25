<?php
namespace LuzernTourismus\Pixxio\Data\Comment;
use Nemundo\Model\Data\AbstractModelUpdate;
class CommentUpdate extends AbstractModelUpdate {
/**
* @var CommentModel
*/
public $model;

/**
* @var string
*/
public $fileId;

/**
* @var string
*/
public $userId;

/**
* @var string
*/
public $comment;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
parent::update();
}
}