<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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
public $metadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType
*/
public $metadata;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $value;

protected function loadModel() {
$this->tableName = "pixxio_file_metadata";
$this->aliasTableName = "pixxio_file_metadata";
$this->label = "File Metadata";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_file_metadata";
$this->id->externalTableName = "pixxio_file_metadata";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_file_metadata_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_file_metadata";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_file_metadata_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = false;

$this->metadataId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->metadataId->tableName = "pixxio_file_metadata";
$this->metadataId->fieldName = "metadata";
$this->metadataId->aliasFieldName = "pixxio_file_metadata_metadata";
$this->metadataId->label = "Metadata";
$this->metadataId->allowNullValue = false;

$this->value = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->value->tableName = "pixxio_file_metadata";
$this->value->externalTableName = "pixxio_file_metadata";
$this->value->fieldName = "value";
$this->value->aliasFieldName = "pixxio_file_metadata_value";
$this->value->label = "Value";
$this->value->allowNullValue = true;

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_file_metadata_file");
$this->file->tableName = "pixxio_file_metadata";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_file_metadata_file";
$this->file->label = "File";
}
return $this;
}
public function loadMetadata() {
if ($this->metadata == null) {
$this->metadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType($this, "pixxio_file_metadata_metadata");
$this->metadata->tableName = "pixxio_file_metadata";
$this->metadata->fieldName = "metadata";
$this->metadata->aliasFieldName = "pixxio_file_metadata_metadata";
$this->metadata->label = "Metadata";
}
return $this;
}
}