<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

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

}
}