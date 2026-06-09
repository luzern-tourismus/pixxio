<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var DirectoryModel
*/
public $model;

public function __construct() {
$this->model = new DirectoryModel();
parent::__construct();
}
/**
* @return \LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataRow[]
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
* @return \LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}