<?php
namespace LuzernTourismus\Pixxio\Data\Keyword;
class KeywordExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $keyword;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = KeywordModel::class;
$this->externalTableName = "pixxio_keyword";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->keyword = new \Nemundo\Model\Type\Text\TextType();
$this->keyword->fieldName = "keyword";
$this->keyword->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->keyword->externalTableName = $this->externalTableName;
$this->keyword->aliasFieldName = $this->keyword->tableName . "_" . $this->keyword->fieldName;
$this->keyword->label = "Keyword";
$this->addType($this->keyword);

}
}