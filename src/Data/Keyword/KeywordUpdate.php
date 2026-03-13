<?php
namespace LuzernTourismus\Pixxio\Data\Keyword;
use Nemundo\Model\Data\AbstractModelUpdate;
class KeywordUpdate extends AbstractModelUpdate {
/**
* @var KeywordModel
*/
public $model;

/**
* @var string
*/
public $keyword;

public function __construct() {
parent::__construct();
$this->model = new KeywordModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->keyword, $this->keyword);
parent::update();
}
}