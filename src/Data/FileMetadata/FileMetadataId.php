<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
use Nemundo\Model\Id\AbstractModelIdValue;
class FileMetadataId extends AbstractModelIdValue {
/**
* @var FileMetadataModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
}