<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadataType;
class CustomMetadataTypeRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CustomMetadataTypeModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $type;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->type = $this->getModelValue($model->type);
}
}