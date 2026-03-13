<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
use Nemundo\Model\Id\AbstractModelIdValue;
class DirectoryId extends AbstractModelIdValue {
/**
* @var DirectoryModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new DirectoryModel();
}
}