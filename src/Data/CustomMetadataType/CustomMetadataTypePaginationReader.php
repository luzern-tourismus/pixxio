<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CustomMetadataTypeModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataTypeModel();
}
/**
* @return CustomMetadataTypeRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CustomMetadataTypeRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}