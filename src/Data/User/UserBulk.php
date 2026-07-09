<?php
namespace LuzernTourismus\Pixxio\Data\User;
class UserBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var UserModel
*/
protected $model;

/**
* @var int
*/
public $id;

/**
* @var string
*/
public $userName;

/**
* @var string
*/
public $displayName;

/**
* @var string
*/
public $mediaspaceId;

/**
* @var bool
*/
public $active;

/**
* @var bool
*/
public $importStatus;

/**
* @var string
*/
public $email;

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->userName, $this->userName);
$this->typeValueList->setModelValue($this->model->displayName, $this->displayName);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->email, $this->email);
$id = parent::save();
return $id;
}
}