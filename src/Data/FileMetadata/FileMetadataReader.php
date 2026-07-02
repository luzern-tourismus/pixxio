<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var FileMetadataModel
*/
public $model;

public function __construct() {
$this->model = new FileMetadataModel();
parent::__construct();
}
/**
* @return FileMetadataRow[]
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
* @return FileMetadataRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return FileMetadataRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new FileMetadataRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}