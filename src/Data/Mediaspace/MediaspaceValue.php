<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var MediaspaceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
}