<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

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
public $userId;

/**
* @var \LuzernTourismus\Pixxio\Data\User\UserExternalType
*/
public $user;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $dynamicCollection;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CollectionModel::class;
$this->externalTableName = "pixxio_collection";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->collection = new \Nemundo\Model\Type\Text\TextType();
$this->collection->fieldName = "collection";
$this->collection->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->collection->externalTableName = $this->externalTableName;
$this->collection->aliasFieldName = $this->collection->tableName . "_" . $this->collection->fieldName;
$this->collection->label = "Collection";
$this->addType($this->collection);

$this->mediaspaceId = new \Nemundo\Model\Type\Id\IdType();
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspaceId->aliasFieldName = $this->mediaspaceId->tableName ."_".$this->mediaspaceId->fieldName;
$this->mediaspaceId->label = "Mediaspace";
$this->addType($this->mediaspaceId);

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

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->dynamicCollection = new \Nemundo\Model\Type\Number\YesNoType();
$this->dynamicCollection->fieldName = "dynamic_collection";
$this->dynamicCollection->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dynamicCollection->externalTableName = $this->externalTableName;
$this->dynamicCollection->aliasFieldName = $this->dynamicCollection->tableName . "_" . $this->dynamicCollection->fieldName;
$this->dynamicCollection->label = "Dynamic Collection";
$this->addType($this->dynamicCollection);

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
public function loadUser() {
if ($this->user == null) {
$this->user = new \LuzernTourismus\Pixxio\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
}