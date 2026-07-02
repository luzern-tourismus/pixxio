<?php
namespace LuzernTourismus\Pixxio\Data\FileMetadata;
class FileMetadata extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FileMetadataModel
*/
protected $model;

/**
* @var string
*/
public $fileId;

/**
* @var string
*/
public $metadataId;

/**
* @var string
*/
public $value;

public function __construct() {
parent::__construct();
$this->model = new FileMetadataModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->fileId, $this->fileId);
$this->typeValueList->setModelValue($this->model->metadataId, $this->metadataId);
$this->typeValueList->setModelValue($this->model->value, $this->value);
$id = parent::save();
return $id;
}
}