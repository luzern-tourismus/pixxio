<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var DirectoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
}