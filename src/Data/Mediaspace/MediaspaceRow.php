<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var MediaspaceModel
*/
public $model;

/**
* @var string
*/
public $id;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->url = $this->getModelValue($model->url);
$this->apiKey = $this->getModelValue($model->apiKey);
$this->mediaspace = $this->getModelValue($model->mediaspace);
}
}