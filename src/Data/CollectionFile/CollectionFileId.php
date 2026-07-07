<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
use Nemundo\Model\Id\AbstractModelIdValue;
class CollectionFileId extends AbstractModelIdValue {
/**
* @var CollectionFileModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CollectionFileModel();
}
}