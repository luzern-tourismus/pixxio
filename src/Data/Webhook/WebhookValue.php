<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WebhookModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebhookModel();
}
}