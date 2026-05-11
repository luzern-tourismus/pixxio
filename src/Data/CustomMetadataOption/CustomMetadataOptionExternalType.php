<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $customMetadataId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType
*/
public $customMetadata;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $option;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $importStatus;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CustomMetadataOptionModel::class;
$this->externalTableName = "pixxio_custom_metadata_option";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->customMetadataId = new \Nemundo\Model\Type\Id\IdType();
$this->customMetadataId->fieldName = "custom_metadata";
$this->customMetadataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->customMetadataId->aliasFieldName = $this->customMetadataId->tableName ."_".$this->customMetadataId->fieldName;
$this->customMetadataId->label = "Custom Metadata";
$this->addType($this->customMetadataId);

$this->option = new \Nemundo\Model\Type\Text\TextType();
$this->option->fieldName = "option";
$this->option->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->option->externalTableName = $this->externalTableName;
$this->option->aliasFieldName = $this->option->tableName . "_" . $this->option->fieldName;
$this->option->label = "Option";
$this->addType($this->option);

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->importStatus->fieldName = "import_status";
$this->importStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->importStatus->externalTableName = $this->externalTableName;
$this->importStatus->aliasFieldName = $this->importStatus->tableName . "_" . $this->importStatus->fieldName;
$this->importStatus->label = "Import Status";
$this->addType($this->importStatus);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

}
public function loadCustomMetadata() {
if ($this->customMetadata == null) {
$this->customMetadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType(null, $this->parentFieldName . "_custom_metadata");
$this->customMetadata->fieldName = "custom_metadata";
$this->customMetadata->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->customMetadata->aliasFieldName = $this->customMetadata->tableName ."_".$this->customMetadata->fieldName;
$this->customMetadata->label = "Custom Metadata";
$this->addType($this->customMetadata);
}
return $this;
}
}