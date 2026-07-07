<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $metadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType
*/
public $metadata;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

protected function loadModel() {
$this->tableName = "pixxio_metadata_option_value";
$this->aliasTableName = "pixxio_metadata_option_value";
$this->label = "Metadata Option Value";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_metadata_option_value";
$this->id->externalTableName = "pixxio_metadata_option_value";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_metadata_option_value_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->metadataId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->metadataId->tableName = "pixxio_metadata_option_value";
$this->metadataId->fieldName = "metadata";
$this->metadataId->aliasFieldName = "pixxio_metadata_option_value_metadata";
$this->metadataId->label = "Metadata";
$this->metadataId->allowNullValue = false;

$this->optionId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->optionId->tableName = "pixxio_metadata_option_value";
$this->optionId->fieldName = "option";
$this->optionId->aliasFieldName = "pixxio_metadata_option_value_option";
$this->optionId->label = "Option";
$this->optionId->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_metadata_option_value";
$this->active->externalTableName = "pixxio_metadata_option_value";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_metadata_option_value_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_metadata_option_value";
$this->importStatus->externalTableName = "pixxio_metadata_option_value";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_metadata_option_value_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_metadata_option_value";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_metadata_option_value_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "file_metadata_option";
$index->addType($this->fileId);
$index->addType($this->metadataId);
$index->addType($this->optionId);

}
public function loadMetadata() {
if ($this->metadata == null) {
$this->metadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType($this, "pixxio_metadata_option_value_metadata");
$this->metadata->tableName = "pixxio_metadata_option_value";
$this->metadata->fieldName = "metadata";
$this->metadata->aliasFieldName = "pixxio_metadata_option_value_metadata";
$this->metadata->label = "Metadata";
}
return $this;
}
public function loadOption() {
if ($this->option == null) {
$this->option = new \LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionExternalType($this, "pixxio_metadata_option_value_option");
$this->option->tableName = "pixxio_metadata_option_value";
$this->option->fieldName = "option";
$this->option->aliasFieldName = "pixxio_metadata_option_value_option";
$this->option->label = "Option";
}
return $this;
}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_metadata_option_value_file");
$this->file->tableName = "pixxio_metadata_option_value";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_metadata_option_value_file";
$this->file->label = "File";
}
return $this;
}
}