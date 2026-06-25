<?php
namespace LuzernTourismus\Pixxio\Data\User;
class UserReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var UserModel
*/
public $model;

public function __construct() {
$this->model = new UserModel();
parent::__construct();
}
/**
* @return UserRow[]
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
* @return UserRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return UserRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new UserRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}