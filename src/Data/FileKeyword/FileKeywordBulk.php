<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var FileKeywordModel
*/
protected $model;

/**
* @var string
*/
public $fileId;

/**
* @var string
*/
public $keywordId;

public function __construct() {
parent::__construct();
$this->model = new FileKeywordModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->keywordId, $this->keywordId);
$id = parent::save();
return $id;
}
}