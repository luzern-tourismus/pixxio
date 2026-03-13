<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileKeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileKeywordModel();
}
/**
* @return FileKeywordRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FileKeywordRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}