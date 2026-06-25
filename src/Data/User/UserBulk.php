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

public function __construct() {
parent::__construct();
$this->model = new UserModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->userName, $this->userName);
$this->typeValueList->setModelValue($this->model->displayName, $this->displayName);
$id = parent::save();
return $id;
}
}