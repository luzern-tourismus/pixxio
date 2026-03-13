<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileKeywordModel
*/
public $model;

public function __construct() {
$this->model = new FileKeywordModel();
parent::__construct();
}
/**
* @return FileKeywordRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return FileKeywordRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FileKeywordRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FileKeywordRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}