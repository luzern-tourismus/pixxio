<?php
namespace LuzernTourismus\Pixxio\Data\Job;
class JobRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var JobModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Reader\File\FileDataRow
*/
public $file;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $createDateTime;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $modifyDateTime;

/**
* @var bool
*/
public $isDuplicate;

/**
* @var string
*/
public $json;

/**
* @var bool
*/
public $success;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->fileId = intval($this->getModelValue($model->fileId));
if ($model->file !== null) {
$this->loadLuzernTourismusPixxioDataFileFilefileRow($model->file);
}
$this->createDateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->createDateTime));
$this->modifyDateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->modifyDateTime));
$this->isDuplicate = boolval($this->getModelValue($model->isDuplicate));
$this->json = $this->getModelValue($model->json);
$this->success = boolval($this->getModelValue($model->success));
}
private function loadLuzernTourismusPixxioDataFileFilefileRow($model) {
$this->file = new \LuzernTourismus\Pixxio\Reader\File\FileDataRow($this->row, $model);
}
}