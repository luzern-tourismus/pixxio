<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var CustomMetadataTypeModel
*/
public $model;

public function __construct() {
$this->model = new CustomMetadataTypeModel();
parent::__construct();
}
/**
* @return CustomMetadataTypeRow[]
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
* @return CustomMetadataTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return CustomMetadataTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new CustomMetadataTypeRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}