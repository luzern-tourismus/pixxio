<?php
namespace LuzernTourismus\Pixxio\Data\File;
class FileReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileModel
*/
public $model;

public function __construct() {
$this->model = new FileModel();
parent::__construct();
}
/**
* @return \LuzernTourismus\Pixxio\Reader\File\FileDataRow[]
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
* @return \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}