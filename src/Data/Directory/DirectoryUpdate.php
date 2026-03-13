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

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->directory, $this->directory);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
parent::update();
}
}