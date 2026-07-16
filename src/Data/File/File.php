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

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $subject;

/**
* @var string
*/
public $fileExtension;

/**
* @var int
*/
public $fileSize;

/**
* @var string
*/
public $previewUrl;

/**
* @var string
*/
public $json;

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
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$this->typeValueList->setModelValue($this->model->fileExtension, $this->fileExtension);
$this->typeValueList->setModelValue($this->model->fileSize, $this->fileSize);
$this->typeValueList->setModelValue($this->model->previewUrl, $this->previewUrl);
$this->typeValueList->setModelValue($this->model->json, $this->json);
$id = parent::save();
return $id;
}
}