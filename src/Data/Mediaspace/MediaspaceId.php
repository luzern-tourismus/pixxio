<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
use Nemundo\Model\Id\AbstractModelIdValue;
class MediaspaceId extends AbstractModelIdValue {
/**
* @var MediaspaceModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
}