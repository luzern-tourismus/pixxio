<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var DirectoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
/**
* @return DirectoryRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new DirectoryRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}