<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FileMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
}