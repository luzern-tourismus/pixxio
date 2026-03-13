<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $keywordId;

/**
* @var \LuzernTourismus\Pixxio\Data\Keyword\KeywordExternalType
*/
public $keyword;

protected function loadModel() {
$this->tableName = "pixxio_file_keyword";
$this->aliasTableName = "pixxio_file_keyword";
$this->label = "File Keyword";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_file_keyword";
$this->id->externalTableName = "pixxio_file_keyword";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_file_keyword_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_file_keyword";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_file_keyword_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = false;

$this->keywordId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->keywordId->tableName = "pixxio_file_keyword";
$this->keywordId->fieldName = "keyword";
$this->keywordId->aliasFieldName = "pixxio_file_keyword_keyword";
$this->keywordId->label = "Keyword";
$this->keywordId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "file_keyword";
$index->addType($this->fileId);
$index->addType($this->keywordId);

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_file_keyword_file");
$this->file->tableName = "pixxio_file_keyword";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_file_keyword_file";
$this->file->label = "File";
}
return $this;
}
public function loadKeyword() {
if ($this->keyword == null) {
$this->keyword = new \LuzernTourismus\Pixxio\Data\Keyword\KeywordExternalType($this, "pixxio_file_keyword_keyword");
$this->keyword->tableName = "pixxio_file_keyword";
$this->keyword->fieldName = "keyword";
$this->keyword->aliasFieldName = "pixxio_file_keyword_keyword";
$this->keyword->label = "Keyword";
}
return $this;
}
}