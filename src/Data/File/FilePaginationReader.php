<?php
namespace LuzernTourismus\Pixxio\Data\File;
class FilePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
/**
* @return \LuzernTourismus\Pixxio\Reader\File\FileDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}