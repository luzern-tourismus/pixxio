<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValueReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MetadataOptionValueModel
*/
public $model;

public function __construct() {
$this->model = new MetadataOptionValueModel();
parent::__construct();
}
/**
* @return MetadataOptionValueRow[]
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
* @return MetadataOptionValueRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MetadataOptionValueRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MetadataOptionValueRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}