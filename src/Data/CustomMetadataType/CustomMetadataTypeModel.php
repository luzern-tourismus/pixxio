<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $type;

protected function loadModel() {
$this->tableName = "pixxio_custom_metadata_type";
$this->aliasTableName = "pixxio_custom_metadata_type";
$this->label = "Custom Metadata Type";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_custom_metadata_type";
$this->id->externalTableName = "pixxio_custom_metadata_type";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_custom_metadata_type_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->type = new \Nemundo\Model\Type\Text\TextType($this);
$this->type->tableName = "pixxio_custom_metadata_type";
$this->type->externalTableName = "pixxio_custom_metadata_type";
$this->type->fieldName = "type";
$this->type->aliasFieldName = "pixxio_custom_metadata_type_type";
$this->type->label = "Type";
$this->type->allowNullValue = false;
$this->type->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "type";
$index->addType($this->type);

}
}