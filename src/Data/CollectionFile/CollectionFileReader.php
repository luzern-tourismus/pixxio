<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CollectionFileModel
*/
public $model;

public function __construct() {
$this->model = new CollectionFileModel();
parent::__construct();
}
/**
* @return CollectionFileRow[]
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
* @return CollectionFileRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CollectionFileRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CollectionFileRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}