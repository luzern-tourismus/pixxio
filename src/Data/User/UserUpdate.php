<?php
namespace LuzernTourismus\Pixxio\Data\User;
use Nemundo\Model\Data\AbstractModelUpdate;
class UserUpdate extends AbstractModelUpdate {
/**
* @var UserModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->userName, $this->userName);
$this->typeValueList->setModelValue($this->model->displayName, $this->displayName);
$this->typeValueList->setModelValue($this->model->mediaspaceId, $this->mediaspaceId);
$this->typeValueList->setModelValue($this->model->active, $this->active);
$this->typeValueList->setModelValue($this->model->importStatus, $this->importStatus);
$this->typeValueList->setModelValue($this->model->email, $this->email);
parent::update();
}
}