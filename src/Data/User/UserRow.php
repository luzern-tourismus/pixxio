<?php
namespace LuzernTourismus\Pixxio\Data\User;
class UserRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var UserModel
*/
public $model;

/**
* @var string
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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->userName = $this->getModelValue($model->userName);
$this->displayName = $this->getModelValue($model->displayName);
}
}