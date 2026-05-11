<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "pixxio_custom_metadata_option";
$this->aliasTableName = "pixxio_custom_metadata_option";
$this->label = "Custom Metadata Option";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_custom_metadata_option";
$this->id->externalTableName = "pixxio_custom_metadata_option";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_custom_metadata_option_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->customMetadataId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->customMetadataId->tableName = "pixxio_custom_metadata_option";
$this->customMetadataId->fieldName = "custom_metadata";
$this->customMetadataId->aliasFieldName = "pixxio_custom_metadata_option_custom_metadata";
$this->customMetadataId->label = "Custom Metadata";
$this->customMetadataId->allowNullValue = false;

$this->option = new \Nemundo\Model\Type\Text\TextType($this);
$this->option->tableName = "pixxio_custom_metadata_option";
$this->option->externalTableName = "pixxio_custom_metadata_option";
$this->option->fieldName = "option";
$this->option->aliasFieldName = "pixxio_custom_metadata_option_option";
$this->option->label = "Option";
$this->option->allowNullValue = false;
$this->option->length = 255;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_custom_metadata_option";
$this->importStatus->externalTableName = "pixxio_custom_metadata_option";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_custom_metadata_option_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_custom_metadata_option";
$this->active->externalTableName = "pixxio_custom_metadata_option";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_custom_metadata_option_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

}
public function loadCustomMetadata() {
if ($this->customMetadata == null) {
$this->customMetadata = new \LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataExternalType($this, "pixxio_custom_metadata_option_custom_metadata");
$this->customMetadata->tableName = "pixxio_custom_metadata_option";
$this->customMetadata->fieldName = "custom_metadata";
$this->customMetadata->aliasFieldName = "pixxio_custom_metadata_option_custom_metadata";
$this->customMetadata->label = "Custom Metadata";
}
return $this;
}
}