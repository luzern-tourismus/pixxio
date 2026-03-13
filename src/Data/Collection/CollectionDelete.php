<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionModel();
}
}