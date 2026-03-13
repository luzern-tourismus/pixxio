<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class Mediaspace extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var MediaspaceModel
*/
protected $model;

/**
* @var string
*/
public $url;

/**
* @var string
*/
public $apiKey;

/**
* @var string
*/
public $mediaspace;

public function __construct() {
parent::__construct();
$this->model = new MediaspaceModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->url, $this->url);
$this->typeValueList->setModelValue($this->model->apiKey, $this->apiKey);
$this->typeValueList->setModelValue($this->model->mediaspace, $this->mediaspace);
$id = parent::save();
return $id;
}
}