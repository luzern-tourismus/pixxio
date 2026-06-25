<?php
namespace LuzernTourismus\Pixxio\Data\Comment;
class CommentRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CommentModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public $file;

/**
* @var int
*/
public $userId;

/**
* @var \LuzernTourismus\Pixxio\Data\User\UserRow
*/
public $user;

/**
* @var string
*/
public $comment;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fileId = intval($this->getModelValue($model->fileId));
if ($model->file !== null) {
$this->loadLuzernTourismusPixxioDataFileFilefileRow($model->file);
}
$this->userId = intval($this->getModelValue($model->userId));
if ($model->user !== null) {
$this->loadLuzernTourismusPixxioDataUserUseruserRow($model->user);
}
$this->comment = $this->getModelValue($model->comment);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
}
private function loadLuzernTourismusPixxioDataFileFilefileRow($model) {
$this->file = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataUserUseruserRow($model) {
$this->user = new \LuzernTourismus\Pixxio\Data\User\UserRow($this->row, $model);
}
}