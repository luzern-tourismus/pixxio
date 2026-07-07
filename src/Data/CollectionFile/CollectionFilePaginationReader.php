<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFilePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CollectionFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionFileModel();
}
/**
* @return CollectionFileRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CollectionFileRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}