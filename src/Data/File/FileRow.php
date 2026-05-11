<?php
namespace LuzernTourismus\Pixxio\Data\File;
class FileRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var FileModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $filename;

/**
* @var int
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow
*/
public $mediaspace;

/**
* @var string
*/
public $fileUrl;

/**
* @var string
*/
public $creator;

/**
* @var int
*/
public $directoryId;

/**
* @var \LuzernTourismus\Pixxio\Data\Directory\DirectoryRow
*/
public $directory;

/**
* @var bool
*/
public $importStatus;

/**
* @var bool
*/
public $active;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model, $multiLanguage = false) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->filename = $this->getModelValue($model->filename);
$this->mediaspaceId = intval($this->getModelValue($model->mediaspaceId));
if ($model->mediaspace !== null) {
$this->loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model->mediaspace);
}
$this->fileUrl = $this->getModelValue($model->fileUrl);
$this->creator = $this->getModelValue($model->creator);
$this->directoryId = intval($this->getModelValue($model->directoryId));
if ($model->directory !== null) {
$this->loadLuzernTourismusPixxioDataDirectoryDirectorydirectoryRow($model->directory);
}
$this->importStatus = boolval($this->getModelValue($model->importStatus));
$this->active = boolval($this->getModelValue($model->active));
}
private function loadLuzernTourismusPixxioDataMediaspaceMediaspacemediaspaceRow($model) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow($this->row, $model);
}
private function loadLuzernTourismusPixxioDataDirectoryDirectorydirectoryRow($model) {
$this->directory = new \LuzernTourismus\Pixxio\Data\Directory\DirectoryRow($this->row, $model);
}
}