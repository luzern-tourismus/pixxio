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
* @return \LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\Pixxio\Reader\Directory\DirectoryDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}