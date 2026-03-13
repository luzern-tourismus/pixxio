<?php
namespace LuzernTourismus\Pixxio\Data\Keyword;
class Keyword extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var KeywordModel
*/
protected $model;

/**
* @var string
*/
public $keyword;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->keyword, $this->keyword);
$id = parent::save();
return $id;
}
}