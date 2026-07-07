<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var CollectionFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionFileModel();
}
}