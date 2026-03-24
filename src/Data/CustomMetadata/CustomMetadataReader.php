<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
$this->model = new CustomMetadataModel();
parent::__construct();
}
/**
* @return CustomMetadataRow[]
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
* @return CustomMetadataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CustomMetadataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CustomMetadataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}