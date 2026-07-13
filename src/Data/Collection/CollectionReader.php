<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CollectionModel
*/
public $model;

public function __construct() {
$this->model = new CollectionModel();
parent::__construct();
}
/**
* @return \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow[]
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
* @return \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}