<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $metadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType
*/
public $metadata;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $optionId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionExternalType
*/
public $option;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $importStatus;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MetadataOptionValueModel::class;
$this->externalTableName = "pixxio_metadata_option_value";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->metadataId = new \Nemundo\Model\Type\Id\IdType();
$this->metadataId->fieldName = "metadata";
$this->metadataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->metadataId->aliasFieldName = $this->metadataId->tableName ."_".$this->metadataId->fieldName;
$this->metadataId->label = "Metadata";
$this->addType($this->metadataId);

$this->optionId = new \Nemundo\Model\Type\Id\IdType();
$this->optionId->fieldName = "option";
$this->optionId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->optionId->aliasFieldName = $this->optionId->tableName ."_".$this->optionId->fieldName;
$this->optionId->label = "Option";
$this->addType($this->optionId);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->importStatus->fieldName = "import_status";
$this->importStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->importStatus->externalTableName = $this->externalTableName;
$this->importStatus->aliasFieldName = $this->importStatus->tableName . "_" . $this->importStatus->fieldName;
$this->importStatus->label = "Import Status";
$this->addType($this->importStatus);

$this->fileId = new \Nemundo\Model\Type\Id\IdType();
$this->fileId->fieldName = "file";
$this->fileId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileId->aliasFieldName = $this->fileId->tableName ."_".$this->fileId->fieldName;
$this->fileId->label = "File";
$this->addType($this->fileId);

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
public function loadOption() {
if ($this->option == null) {
$this->option = new \LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionExternalType(null, $this->parentFieldName . "_option");
$this->option->fieldName = "option";
$this->option->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->option->aliasFieldName = $this->option->tableName ."_".$this->option->fieldName;
$this->option->label = "Option";
$this->addType($this->option);
}
return $this;
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