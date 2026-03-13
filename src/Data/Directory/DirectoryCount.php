<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var DirectoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
}