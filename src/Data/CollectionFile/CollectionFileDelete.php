<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var CollectionFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionFileModel();
}
}