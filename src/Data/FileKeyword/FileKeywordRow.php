<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FileKeywordModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public $file;

/**
* @var int
*/
public $keywordId;

/**
* @var \LuzernTourismus\Pixxio\Data\Keyword\KeywordRow
*/
public $keyword;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fileId = intval($this->getModelValue($model->fileId));
if ($model->file !== null) {
$this->loadLuzernTourismusPixxioDataFileFilefileRow($model->file);
}
$this->keywordId = intval($this->getModelValue($model->keywordId));
if ($model->keyword !== null) {
$this->loadLuzernTourismusPixxioDataKeywordKeywordkeywordRow($model->keyword);
}
}
private function loadLuzernTourismusPixxioDataFileFilefileRow($model) {
$this->file = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataKeywordKeywordkeywordRow($model) {
$this->keyword = new \LuzernTourismus\Pixxio\Data\Keyword\KeywordRow($this->row, $model);
}
}