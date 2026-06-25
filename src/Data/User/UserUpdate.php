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

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->userName, $this->userName);
$this->typeValueList->setModelValue($this->model->displayName, $this->displayName);
parent::update();
}
}