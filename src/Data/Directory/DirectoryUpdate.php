<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
use Nemundo\Model\Data\AbstractModelUpdate;
class DirectoryUpdate extends AbstractModelUpdate {
/**
* @var DirectoryModel
*/
public $model;

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

/**
* @var int
*/
public $quantity;

/**
* @var string
*/
public $parentId;

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->directory, $this->directory);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->quantity, $this->quantity);
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
parent::update();
}
}