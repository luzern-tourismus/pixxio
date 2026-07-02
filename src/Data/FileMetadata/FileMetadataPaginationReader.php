<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var FileMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
/**
* @return FileMetadataRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new FileMetadataRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}