<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var CustomMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CustomMetadataModel();
}
/**
* @return CustomMetadataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new CustomMetadataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}