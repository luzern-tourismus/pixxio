<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CustomMetadataModel::class;
$this->externalTableName = "pixxio_custom_metadata";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->mediaspaceId = new \Nemundo\Model\Type\Id\IdType();
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspaceId->aliasFieldName = $this->mediaspaceId->tableName ."_".$this->mediaspaceId->fieldName;
$this->mediaspaceId->label = "Mediaspace";
$this->addType($this->mediaspaceId);

$this->name = new \Nemundo\Model\Type\Text\TextType();
$this->name->fieldName = "name";
$this->name->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->name->externalTableName = $this->externalTableName;
$this->name->aliasFieldName = $this->name->tableName . "_" . $this->name->fieldName;
$this->name->label = "Name";
$this->addType($this->name);

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType(null, $this->parentFieldName . "_mediaspace");
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspace->aliasFieldName = $this->mediaspace->tableName ."_".$this->mediaspace->fieldName;
$this->mediaspace->label = "Mediaspace";
$this->addType($this->mediaspace);
}
return $this;
}
}