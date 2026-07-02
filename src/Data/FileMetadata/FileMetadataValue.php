<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FileMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
}