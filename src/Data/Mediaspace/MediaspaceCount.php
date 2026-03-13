<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var MediaspaceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
}