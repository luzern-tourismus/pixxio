<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileKeywordUpdate extends AbstractModelUpdate {
/**
* @var FileKeywordModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->keywordId, $this->keywordId);
parent::update();
}
}