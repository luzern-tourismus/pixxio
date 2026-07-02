<?php
namespace LuzernTourismus\Pixxio\Data\MetadataOptionValue;
use Nemundo\Model\Id\AbstractModelIdValue;
class MetadataOptionValueId extends AbstractModelIdValue {
/**
* @var MetadataOptionValueModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new MetadataOptionValueModel();
}
}