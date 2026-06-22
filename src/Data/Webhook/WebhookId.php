<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
use Nemundo\Model\Id\AbstractModelIdValue;
class WebhookId extends AbstractModelIdValue {
/**
* @var WebhookModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebhookModel();
}
}