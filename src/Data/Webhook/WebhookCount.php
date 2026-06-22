<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WebhookModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebhookModel();
}
}