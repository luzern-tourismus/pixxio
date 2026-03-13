<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var FileKeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileKeywordModel();
}
}