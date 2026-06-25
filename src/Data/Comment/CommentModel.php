<?php
namespace LuzernTourismus\Pixxio\Data\Comment;
class CommentModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $userId;

/**
* @var \LuzernTourismus\Pixxio\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $comment;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

protected function loadModel() {
$this->tableName = "pixxio_comment";
$this->aliasTableName = "pixxio_comment";
$this->label = "Comment";

$this->primaryIndex = new \Nemundo\Db\Index\LargeNumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_comment";
$this->id->externalTableName = "pixxio_comment";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_comment_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_comment";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_comment_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->userId->tableName = "pixxio_comment";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "pixxio_comment_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$this->comment = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->comment->tableName = "pixxio_comment";
$this->comment->externalTableName = "pixxio_comment";
$this->comment->fieldName = "comment";
$this->comment->aliasFieldName = "pixxio_comment_comment";
$this->comment->label = "Comment";
$this->comment->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "pixxio_comment";
$this->dateTime->externalTableName = "pixxio_comment";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "pixxio_comment_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_comment_file");
$this->file->tableName = "pixxio_comment";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_comment_file";
$this->file->label = "File";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \LuzernTourismus\Pixxio\Data\User\UserExternalType($this, "pixxio_comment_user");
$this->user->tableName = "pixxio_comment";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "pixxio_comment_user";
$this->user->label = "User";
}
return $this;
}
}