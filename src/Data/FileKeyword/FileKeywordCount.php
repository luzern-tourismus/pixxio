<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
class FileKeywordCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var FileKeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileKeywordModel();
}
}