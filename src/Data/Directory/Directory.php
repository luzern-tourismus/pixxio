<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class Directory extends \Nemundo\Model\Data\AbstractModelData {
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

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->directory, $this->directory);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$id = parent::save();
return $id;
}
}