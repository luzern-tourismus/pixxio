<?php
namespace LuzernTourismus\Pixxio\Data\Comment;
class CommentBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
$id = parent::save();
return $id;
}
}