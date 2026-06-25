<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
use Nemundo\Model\Data\AbstractModelUpdate;
class MediaspaceUpdate extends AbstractModelUpdate {
/**
* @var MediaspaceModel
*/
public $model;

/**
* @var string
*/
public $url;

/**
* @var string
*/
public $apiKey;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->apiKey, $this->apiKey);
parent::update();
}
}