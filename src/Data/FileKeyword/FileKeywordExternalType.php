<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $keywordId;

/**
* @var \LuzernTourismus\Pixxio\Data\Keyword\KeywordExternalType
*/
public $keyword;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FileKeywordModel::class;
$this->externalTableName = "pixxio_file_keyword";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->fileId = new \Nemundo\Model\Type\Id\IdType();
$this->fileId->fieldName = "file";
$this->fileId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileId->aliasFieldName = $this->fileId->tableName ."_".$this->fileId->fieldName;
$this->fileId->label = "File";
$this->addType($this->fileId);

$this->keywordId = new \Nemundo\Model\Type\Id\IdType();
$this->keywordId->fieldName = "keyword";
$this->keywordId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->keywordId->aliasFieldName = $this->keywordId->tableName ."_".$this->keywordId->fieldName;
$this->keywordId->label = "Keyword";
$this->addType($this->keywordId);

}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType(null, $this->parentFieldName . "_file");
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName ."_".$this->file->fieldName;
$this->file->label = "File";
$this->addType($this->file);
}
return $this;
}
public function loadKeyword() {
if ($this->keyword == null) {
$this->keyword = new \LuzernTourismus\Pixxio\Data\Keyword\KeywordExternalType(null, $this->parentFieldName . "_keyword");
$this->keyword->fieldName = "keyword";
$this->keyword->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->keyword->aliasFieldName = $this->keyword->tableName ."_".$this->keyword->fieldName;
$this->keyword->label = "Keyword";
$this->addType($this->keyword);
}
return $this;
}
}