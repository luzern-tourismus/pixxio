<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var MediaspaceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
}