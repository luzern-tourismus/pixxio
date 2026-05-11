<?php
namespace LuzernTourismus\Pixxio\Data\File;
class File extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var FileModel
*/
protected $model;

/**
* @var int
*/
public $id;

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
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->filename, $this->filename);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->fileUrl, $this->fileUrl);
$this->typeValueList->setModelValue($this->model->creator, $this->creator);
$this->typeValueList->setModelValue($this->model->directoryId, $this->directoryId);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$id = parent::save();
return $id;
}
}