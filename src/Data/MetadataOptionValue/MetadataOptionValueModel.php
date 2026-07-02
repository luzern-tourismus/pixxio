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

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "metadata_option";
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
}