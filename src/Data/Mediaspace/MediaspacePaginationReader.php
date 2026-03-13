<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspacePaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var MediaspaceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
/**
* @return MediaspaceRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new MediaspaceRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}