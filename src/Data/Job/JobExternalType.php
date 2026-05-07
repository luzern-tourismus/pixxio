<?php
namespace LuzernTourismus\Pixxio\Data\Job;
class JobExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $createDateTime;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $modifyDateTime;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $isDuplicate;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $json;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $success;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = JobModel::class;
$this->externalTableName = "pixxio_job";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->fileId = new \Nemundo\Model\Type\Id\IdType();
$this->fileId->fieldName = "file";
$this->fileId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileId->aliasFieldName = $this->fileId->tableName ."_".$this->fileId->fieldName;
$this->fileId->label = "File";
$this->addType($this->fileId);

$this->createDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->createDateTime->fieldName = "create_date_time";
$this->createDateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->createDateTime->externalTableName = $this->externalTableName;
$this->createDateTime->aliasFieldName = $this->createDateTime->tableName . "_" . $this->createDateTime->fieldName;
$this->createDateTime->label = "Create Date Time";
$this->addType($this->createDateTime);

$this->modifyDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->modifyDateTime->fieldName = "modify_date_time";
$this->modifyDateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->modifyDateTime->externalTableName = $this->externalTableName;
$this->modifyDateTime->aliasFieldName = $this->modifyDateTime->tableName . "_" . $this->modifyDateTime->fieldName;
$this->modifyDateTime->label = "Modify Date Time";
$this->addType($this->modifyDateTime);

$this->isDuplicate = new \Nemundo\Model\Type\Number\YesNoType();
$this->isDuplicate->fieldName = "is_duplicate";
$this->isDuplicate->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->isDuplicate->externalTableName = $this->externalTableName;
$this->isDuplicate->aliasFieldName = $this->isDuplicate->tableName . "_" . $this->isDuplicate->fieldName;
$this->isDuplicate->label = "Is Duplicate";
$this->addType($this->isDuplicate);

$this->json = new \Nemundo\Model\Type\Text\LargeTextType();
$this->json->fieldName = "json";
$this->json->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->json->externalTableName = $this->externalTableName;
$this->json->aliasFieldName = $this->json->tableName . "_" . $this->json->fieldName;
$this->json->label = "Json";
$this->addType($this->json);

$this->success = new \Nemundo\Model\Type\Number\YesNoType();
$this->success->fieldName = "success";
$this->success->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->success->externalTableName = $this->externalTableName;
$this->success->aliasFieldName = $this->success->tableName . "_" . $this->success->fieldName;
$this->success->label = "Success";
$this->addType($this->success);

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType(null, $this->parentFieldName . "_file");
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName ."_".$this->file->fieldName;
$this->file->label = "File";
$this->addType($this->file);
}
return $this;
}
}