<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $type;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CustomMetadataTypeModel::class;
$this->externalTableName = "pixxio_custom_metadata_type";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->type = new \Nemundo\Model\Type\Text\TextType();
$this->type->fieldName = "type";
$this->type->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->type->externalTableName = $this->externalTableName;
$this->type->aliasFieldName = $this->type->tableName . "_" . $this->type->fieldName;
$this->type->label = "Type";
$this->addType($this->type);

}
}