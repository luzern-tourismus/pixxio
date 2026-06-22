<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var WebhookModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebhookModel();
}
}