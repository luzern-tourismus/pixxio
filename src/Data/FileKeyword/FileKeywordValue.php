<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var FileKeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileKeywordModel();
}
}