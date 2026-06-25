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

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$this->typeValueList->setModelValue($this->model->comment, $this->comment);
parent::update();
}
}