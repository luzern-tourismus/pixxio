<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadataDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FileMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
}