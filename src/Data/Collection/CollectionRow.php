<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CollectionModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $collection;

/**
* @var int
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow
*/
public $mediaspace;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $importStatus;

/**
* @var int
*/
public $userId;

/**
* @var \LuzernTourismus\Pixxio\Data\User\UserRow
*/
public $user;

/**
* @var bool
*/
public $dynamicCollection;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->collection = $this->getModelValue($model->collection);
$this->mediaspaceId = intval($this->getModelValue($model->mediaspaceId));
if ($model->mediaspace !== null) {
$this->loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model->mediaspace);
}
$this->active = boolval($this->getModelValue($model->active));
$this->importStatus = boolval($this->getModelValue($model->importStatus));
$this->userId = intval($this->getModelValue($model->userId));
if ($model->user !== null) {
$this->loadLuzernTourismusPixxioDataUserUseruserRow($model->user);
}
$this->dynamicCollection = boolval($this->getModelValue($model->dynamicCollection));
}
private function loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataUserUseruserRow($model) {
$this->user = new \LuzernTourismus\Pixxio\Data\User\UserRow($this->row, $model);
}
}