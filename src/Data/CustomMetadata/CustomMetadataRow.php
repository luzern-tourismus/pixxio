<?php
namespace LuzernTourismus\Pixxio\Data\CustomMetadata;
class CustomMetadataRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var CustomMetadataModel
*/
public $model;

/**
* @var string
*/
public $id;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
}
}