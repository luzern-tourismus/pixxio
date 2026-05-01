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
}