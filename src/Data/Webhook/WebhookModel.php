<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTime;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $actionName;

/**
* @var \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

protected function loadModel() {
$this->tableName = "pixxio_webhook";
$this->aliasTableName = "pixxio_webhook";
$this->label = "Webhook";

$this->primaryIndex = new \Nemundo\Db\Index\LargeNumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_webhook";
$this->id->externalTableName = "pixxio_webhook";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_webhook_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTime->tableName = "pixxio_webhook";
$this->dateTime->externalTableName = "pixxio_webhook";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "pixxio_webhook_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->actionName = new \Nemundo\Model\Type\Text\TextType($this);
$this->actionName->tableName = "pixxio_webhook";
$this->actionName->externalTableName = "pixxio_webhook";
$this->actionName->fieldName = "action_name";
$this->actionName->aliasFieldName = "pixxio_webhook_action_name";
$this->actionName->label = "Action Name";
$this->actionName->allowNullValue = false;
$this->actionName->length = 255;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_webhook";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_webhook_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = true;

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_webhook_file");
$this->file->tableName = "pixxio_webhook";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_webhook_file";
$this->file->label = "File";
}
return $this;
}
}