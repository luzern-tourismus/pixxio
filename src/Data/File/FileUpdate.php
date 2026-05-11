<?php
namespace LuzernTourismus\Pixxio\Data\File;
use Nemundo\Model\Data\AbstractModelUpdate;
class FileUpdate extends AbstractModelUpdate {
/**
* @var FileModel
*/
public $model;

/**
* @var string
*/
public $filename;

/**
* @var string
*/
public $mediaspaceId;

/**
* @var string
*/
public $fileUrl;

/**
* @var string
*/
public $creator;

/**
* @var string
*/
public $directoryId;

/**
* @var bool
*/
public $importStatus;

/**
* @var bool
*/
public $active;

public function __construct() {
parent::__construct();
$this->model = new FileModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->fileUrl, $this->fileUrl);
$this->typeValueList->setModelValue($this->model->creator, $this->creator);
$this->typeValueList->setModelValue($this->model->directoryId, $this->directoryId);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->active, $this->active);
parent::update();
}
}