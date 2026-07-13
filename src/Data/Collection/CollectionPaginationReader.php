<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionModel();
}
/**
* @return \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \LuzernTourismus\Pixxio\Reader\Collection\CollectionDataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}