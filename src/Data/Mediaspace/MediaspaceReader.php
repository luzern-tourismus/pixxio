<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var MediaspaceModel
*/
public $model;

public function __construct() {
$this->model = new MediaspaceModel();
parent::__construct();
}
/**
* @return MediaspaceRow[]
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
* @return MediaspaceRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return MediaspaceRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new MediaspaceRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}