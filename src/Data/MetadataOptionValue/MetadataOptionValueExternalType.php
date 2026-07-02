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
}