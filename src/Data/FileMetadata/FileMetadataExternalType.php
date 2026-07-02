<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FileMetadataModel::class;
$this->externalTableName = "pixxio_file_metadata";
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

$this->metadataId = new \Nemundo\Model\Type\Id\IdType();
$this->metadataId->fieldName = "metadata";
$this->metadataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->metadataId->aliasFieldName = $this->metadataId->tableName ."_".$this->metadataId->fieldName;
$this->metadataId->label = "Metadata";
$this->addType($this->metadataId);

$this->value = new \Nemundo\Model\Type\Text\LargeTextType();
$this->value->fieldName = "value";
$this->value->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->value->externalTableName = $this->externalTableName;
$this->value->aliasFieldName = $this->value->tableName . "_" . $this->value->fieldName;
$this->value->label = "Value";
$this->addType($this->value);

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
public function loadMetadata() {
if ($this->metadata == null) {
$this->metadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType(null, $this->parentFieldName . "_metadata");
$this->metadata->fieldName = "metadata";
$this->metadata->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->metadata->aliasFieldName = $this->metadata->tableName ."_".$this->metadata->fieldName;
$this->metadata->label = "Metadata";
$this->addType($this->metadata);
}
return $this;
}
}