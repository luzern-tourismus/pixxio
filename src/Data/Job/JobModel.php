<?php
namespace LuzernTourismus\Pixxio\Data\Job;
class JobModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $jobExists;

protected function loadModel() {
$this->tableName = "pixxio_job";
$this->aliasTableName = "pixxio_job";
$this->label = "Job";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_job";
$this->id->externalTableName = "pixxio_job";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_job_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_job";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_job_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = true;

$this->createDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->createDateTime->tableName = "pixxio_job";
$this->createDateTime->externalTableName = "pixxio_job";
$this->createDateTime->fieldName = "create_date_time";
$this->createDateTime->aliasFieldName = "pixxio_job_create_date_time";
$this->createDateTime->label = "Create Date Time";
$this->createDateTime->allowNullValue = true;

$this->modifyDateTime = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->modifyDateTime->tableName = "pixxio_job";
$this->modifyDateTime->externalTableName = "pixxio_job";
$this->modifyDateTime->fieldName = "modify_date_time";
$this->modifyDateTime->aliasFieldName = "pixxio_job_modify_date_time";
$this->modifyDateTime->label = "Modify Date Time";
$this->modifyDateTime->allowNullValue = true;

$this->isDuplicate = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->isDuplicate->tableName = "pixxio_job";
$this->isDuplicate->externalTableName = "pixxio_job";
$this->isDuplicate->fieldName = "is_duplicate";
$this->isDuplicate->aliasFieldName = "pixxio_job_is_duplicate";
$this->isDuplicate->label = "Is Duplicate";
$this->isDuplicate->allowNullValue = false;

$this->json = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->json->tableName = "pixxio_job";
$this->json->externalTableName = "pixxio_job";
$this->json->fieldName = "json";
$this->json->aliasFieldName = "pixxio_job_json";
$this->json->label = "Json";
$this->json->allowNullValue = false;

$this->success = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->success->tableName = "pixxio_job";
$this->success->externalTableName = "pixxio_job";
$this->success->fieldName = "success";
$this->success->aliasFieldName = "pixxio_job_success";
$this->success->label = "Success";
$this->success->allowNullValue = false;

$this->mediaspaceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mediaspaceId->tableName = "pixxio_job";
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->aliasFieldName = "pixxio_job_mediaspace";
$this->mediaspaceId->label = "Mediaspace";
$this->mediaspaceId->allowNullValue = true;

$this->jobExists = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->jobExists->tableName = "pixxio_job";
$this->jobExists->externalTableName = "pixxio_job";
$this->jobExists->fieldName = "job_exists";
$this->jobExists->aliasFieldName = "pixxio_job_job_exists";
$this->jobExists->label = "Job Exists";
$this->jobExists->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "create_date_time";
$index->addType($this->createDateTime);

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_job_file");
$this->file->tableName = "pixxio_job";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_job_file";
$this->file->label = "File";
}
return $this;
}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType($this, "pixxio_job_mediaspace");
$this->mediaspace->tableName = "pixxio_job";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_job_mediaspace";
$this->mediaspace->label = "Mediaspace";
}
return $this;
}
}