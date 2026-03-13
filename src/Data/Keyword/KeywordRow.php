<?php
namespace LuzernTourismus\Pixxio\Data\Keyword;
class KeywordRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var KeywordModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $keyword;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->keyword = $this->getModelValue($model->keyword);
}
}