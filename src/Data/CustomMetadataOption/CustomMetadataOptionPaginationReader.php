<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataOption;
class CustomMetadataOptionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CustomMetadataOptionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataOptionModel();
}
/**
* @return CustomMetadataOptionRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CustomMetadataOptionRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}