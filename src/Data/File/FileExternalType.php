<?php
namespace LuzernTourismus\Pixxio\Data\File;
class FileExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $filename;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $fileUrl;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $creator;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $directoryId;

/**
* @var \LuzernTourismus\Pixxio\Data\Directory\DirectoryExternalType
*/
public $directory;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $importStatus;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = FileModel::class;
$this->externalTableName = "pixxio_file";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->filename = new \Nemundo\Model\Type\Text\TextType();
$this->filename->fieldName = "filename";
$this->filename->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->filename->externalTableName = $this->externalTableName;
$this->filename->aliasFieldName = $this->filename->tableName . "_" . $this->filename->fieldName;
$this->filename->label = "Filename";
$this->addType($this->filename);

$this->mediaspaceId = new \Nemundo\Model\Type\Id\IdType();
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspaceId->aliasFieldName = $this->mediaspaceId->tableName ."_".$this->mediaspaceId->fieldName;
$this->mediaspaceId->label = "Mediaspace";
$this->addType($this->mediaspaceId);

$this->fileUrl = new \Nemundo\Model\Type\Text\TextType();
$this->fileUrl->fieldName = "file_url";
$this->fileUrl->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileUrl->externalTableName = $this->externalTableName;
$this->fileUrl->aliasFieldName = $this->fileUrl->tableName . "_" . $this->fileUrl->fieldName;
$this->fileUrl->label = "File Url";
$this->addType($this->fileUrl);

$this->creator = new \Nemundo\Model\Type\Text\TextType();
$this->creator->fieldName = "creator";
$this->creator->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->creator->externalTableName = $this->externalTableName;
$this->creator->aliasFieldName = $this->creator->tableName . "_" . $this->creator->fieldName;
$this->creator->label = "Creator";
$this->addType($this->creator);

$this->directoryId = new \Nemundo\Model\Type\Id\IdType();
$this->directoryId->fieldName = "directory";
$this->directoryId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->directoryId->aliasFieldName = $this->directoryId->tableName ."_".$this->directoryId->fieldName;
$this->directoryId->label = "Directory";
$this->addType($this->directoryId);

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->importStatus->fieldName = "import_status";
$this->importStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->importStatus->externalTableName = $this->externalTableName;
$this->importStatus->aliasFieldName = $this->importStatus->tableName . "_" . $this->importStatus->fieldName;
$this->importStatus->label = "Import Status";
$this->addType($this->importStatus);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType(null, $this->parentFieldName . "_mediaspace");
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspace->aliasFieldName = $this->mediaspace->tableName ."_".$this->mediaspace->fieldName;
$this->mediaspace->label = "Mediaspace";
$this->addType($this->mediaspace);
}
return $this;
}
public function loadDirectory() {
if ($this->directory == null) {
$this->directory = new \LuzernTourismus\Pixxio\Data\Directory\DirectoryExternalType(null, $this->parentFieldName . "_directory");
$this->directory->fieldName = "directory";
$this->directory->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->directory->aliasFieldName = $this->directory->tableName ."_".$this->directory->fieldName;
$this->directory->label = "Directory";
$this->addType($this->directory);
}
return $this;
}
}