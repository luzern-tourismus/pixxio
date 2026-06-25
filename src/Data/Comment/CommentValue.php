<?php
namespace LuzernTourismus\Pixxio\Data\Comment;
class CommentValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var CommentModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new CommentModel();
}
}