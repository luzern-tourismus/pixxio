<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var DirectoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
}