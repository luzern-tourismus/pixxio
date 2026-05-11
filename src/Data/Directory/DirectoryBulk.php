<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var DirectoryModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $directory;

/**
* @var string
*/
public $mediaspaceId;

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
$this->model = new DirectoryModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->directory, $this->directory);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$id = parent::save();
return $id;
}
}