<?php
namespace LuzernTourismus\Pixxio\Data\User;
class UserModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $userName;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $displayName;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "pixxio_user";
$this->aliasTableName = "pixxio_user";
$this->label = "User";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_user";
$this->id->externalTableName = "pixxio_user";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_user_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->userName = new \Nemundo\Model\Type\Text\TextType($this);
$this->userName->tableName = "pixxio_user";
$this->userName->externalTableName = "pixxio_user";
$this->userName->fieldName = "user_name";
$this->userName->aliasFieldName = "pixxio_user_user_name";
$this->userName->label = "User Name";
$this->userName->allowNullValue = false;
$this->userName->length = 255;

$this->displayName = new \Nemundo\Model\Type\Text\TextType($this);
$this->displayName->tableName = "pixxio_user";
$this->displayName->externalTableName = "pixxio_user";
$this->displayName->fieldName = "display_name";
$this->displayName->aliasFieldName = "pixxio_user_display_name";
$this->displayName->label = "Display Name";
$this->displayName->allowNullValue = false;
$this->displayName->length = 255;

$this->mediaspaceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mediaspaceId->tableName = "pixxio_user";
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->aliasFieldName = "pixxio_user_mediaspace";
$this->mediaspaceId->label = "Mediaspace";
$this->mediaspaceId->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_user";
$this->active->externalTableName = "pixxio_user";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_user_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_user";
$this->importStatus->externalTableName = "pixxio_user";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_user_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType($this, "pixxio_user_mediaspace");
$this->mediaspace->tableName = "pixxio_user";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_user_mediaspace";
$this->mediaspace->label = "Mediaspace";
}
return $this;
}
}