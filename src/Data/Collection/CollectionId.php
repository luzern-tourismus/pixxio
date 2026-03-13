<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
use Nemundo\Model\Id\AbstractModelIdValue;
class CollectionId extends AbstractModelIdValue {
/**
* @var CollectionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionModel();
}
}