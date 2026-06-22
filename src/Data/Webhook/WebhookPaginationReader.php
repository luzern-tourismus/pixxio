<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var WebhookModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WebhookModel();
}
/**
* @return WebhookRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new WebhookRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}