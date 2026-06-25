<?php
namespace LuzernTourismus\Pixxio\Data\User;
class UserExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = UserModel::class;
$this->externalTableName = "pixxio_user";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->userName = new \Nemundo\Model\Type\Text\TextType();
$this->userName->fieldName = "user_name";
$this->userName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userName->externalTableName = $this->externalTableName;
$this->userName->aliasFieldName = $this->userName->tableName . "_" . $this->userName->fieldName;
$this->userName->label = "User Name";
$this->addType($this->userName);

$this->displayName = new \Nemundo\Model\Type\Text\TextType();
$this->displayName->fieldName = "display_name";
$this->displayName->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->displayName->externalTableName = $this->externalTableName;
$this->displayName->aliasFieldName = $this->displayName->tableName . "_" . $this->displayName->fieldName;
$this->displayName->label = "Display Name";
$this->addType($this->displayName);

}
}