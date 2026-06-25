<?php
namespace LuzernTourismus\Pixxio\Data\Comment;
class Comment extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var CommentModel
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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
if ($this->dateTime->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTime, $this->typeValueList);
$property->setValue($this->dateTime);
}
$id = parent::save();
return $id;
}
}