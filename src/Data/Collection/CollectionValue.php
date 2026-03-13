<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionModel();
}
}