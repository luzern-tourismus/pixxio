<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CustomMetadataOptionModel
*/
public $model;

public function __construct() {
$this->model = new CustomMetadataOptionModel();
parent::__construct();
}
/**
* @return CustomMetadataOptionRow[]
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
* @return CustomMetadataOptionRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CustomMetadataOptionRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CustomMetadataOptionRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}