<?php
namespace LuzernTourismus\Pixxio\Data\Keyword;
class KeywordModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $keyword;

protected function loadModel() {
$this->tableName = "pixxio_keyword";
$this->aliasTableName = "pixxio_keyword";
$this->label = "Keyword";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_keyword";
$this->id->externalTableName = "pixxio_keyword";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_keyword_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->keyword = new \Nemundo\Model\Type\Text\TextType($this);
$this->keyword->tableName = "pixxio_keyword";
$this->keyword->externalTableName = "pixxio_keyword";
$this->keyword->fieldName = "keyword";
$this->keyword->aliasFieldName = "pixxio_keyword_keyword";
$this->keyword->label = "Keyword";
$this->keyword->allowNullValue = false;
$this->keyword->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "keyword";
$index->addType($this->keyword);

}
}