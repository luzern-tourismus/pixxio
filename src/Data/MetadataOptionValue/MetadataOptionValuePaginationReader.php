<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
class MetadataOptionValuePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MetadataOptionValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
/**
* @return MetadataOptionValueRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MetadataOptionValueRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}