<?php
namespace LuzernTourismus\Pixxio\Data\FileKeyword;
use Nemundo\Model\Id\AbstractModelIdValue;
class FileKeywordId extends AbstractModelIdValue {
/**
* @var FileKeywordModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new FileKeywordModel();
}
}