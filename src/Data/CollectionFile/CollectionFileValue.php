<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CollectionFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionFileModel();
}
}