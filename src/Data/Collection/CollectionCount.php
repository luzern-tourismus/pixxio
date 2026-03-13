<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionModel();
}
}