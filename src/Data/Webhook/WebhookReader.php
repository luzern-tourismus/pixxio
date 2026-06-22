<?php
namespace LuzernTourismus\Pixxio\Data\Webhook;
class WebhookReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WebhookModel
*/
public $model;

public function __construct() {
$this->model = new WebhookModel();
parent::__construct();
}
/**
* @return WebhookRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return WebhookRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WebhookRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WebhookRow($dataRow, $this->model, $this->multiLanguage);
$row->model = $this->model;
return $row;
}
}