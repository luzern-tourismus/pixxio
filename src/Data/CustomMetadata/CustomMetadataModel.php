<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $name;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $typeId;

/**
* @var \LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataTypeExternalType
*/
public $type;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $importStatus;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadModel() {
$this->tableName = "pixxio_custom_metadata";
$this->aliasTableName = "pixxio_custom_metadata";
$this->label = "Custom Metadata";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_custom_metadata";
$this->id->externalTableName = "pixxio_custom_metadata";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_custom_metadata_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->mediaspaceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mediaspaceId->tableName = "pixxio_custom_metadata";
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->aliasFieldName = "pixxio_custom_metadata_mediaspace";
$this->mediaspaceId->label = "Mediaspace";
$this->mediaspaceId->allowNullValue = false;

$this->name = new \Nemundo\Model\Type\Text\TextType($this);
$this->name->tableName = "pixxio_custom_metadata";
$this->name->externalTableName = "pixxio_custom_metadata";
$this->name->fieldName = "name";
$this->name->aliasFieldName = "pixxio_custom_metadata_name";
$this->name->label = "Name";
$this->name->allowNullValue = false;
$this->name->length = 255;

$this->typeId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->typeId->tableName = "pixxio_custom_metadata";
$this->typeId->fieldName = "type";
$this->typeId->aliasFieldName = "pixxio_custom_metadata_type";
$this->typeId->label = "Type";
$this->typeId->allowNullValue = false;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_custom_metadata";
$this->importStatus->externalTableName = "pixxio_custom_metadata";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_custom_metadata_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_custom_metadata";
$this->active->externalTableName = "pixxio_custom_metadata";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_custom_metadata_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType($this, "pixxio_custom_metadata_mediaspace");
$this->mediaspace->tableName = "pixxio_custom_metadata";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_custom_metadata_mediaspace";
$this->mediaspace->label = "Mediaspace";
}
return $this;
}
public function loadType() {
if ($this->type == null) {
$this->type = new \LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataTypeExternalType($this, "pixxio_custom_metadata_type");
$this->type->tableName = "pixxio_custom_metadata";
$this->type->fieldName = "type";
$this->type->aliasFieldName = "pixxio_custom_metadata_type";
$this->type->label = "Type";
}
return $this;
}
}