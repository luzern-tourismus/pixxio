<?php
namespace LuzernTourismus\Pixxio\Data\File;
class FileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $filename;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
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

protected function loadModel() {
$this->tableName = "pixxio_file";
$this->aliasTableName = "pixxio_file";
$this->label = "File";

$this->primaryIndex = new \Nemundo\Db\Index\LargeNumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_file";
$this->id->externalTableName = "pixxio_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->filename = new \Nemundo\Model\Type\Text\TextType($this);
$this->filename->tableName = "pixxio_file";
$this->filename->externalTableName = "pixxio_file";
$this->filename->fieldName = "filename";
$this->filename->aliasFieldName = "pixxio_file_filename";
$this->filename->label = "Filename";
$this->filename->allowNullValue = false;
$this->filename->length = 255;

$this->mediaspaceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mediaspaceId->tableName = "pixxio_file";
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->aliasFieldName = "pixxio_file_mediaspace";
$this->mediaspaceId->label = "Mediaspace";
$this->mediaspaceId->allowNullValue = false;

$this->fileUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->fileUrl->tableName = "pixxio_file";
$this->fileUrl->externalTableName = "pixxio_file";
$this->fileUrl->fieldName = "file_url";
$this->fileUrl->aliasFieldName = "pixxio_file_file_url";
$this->fileUrl->label = "File Url";
$this->fileUrl->allowNullValue = false;
$this->fileUrl->length = 255;

$this->creator = new \Nemundo\Model\Type\Text\TextType($this);
$this->creator->tableName = "pixxio_file";
$this->creator->externalTableName = "pixxio_file";
$this->creator->fieldName = "creator";
$this->creator->aliasFieldName = "pixxio_file_creator";
$this->creator->label = "Creator";
$this->creator->allowNullValue = true;
$this->creator->length = 255;

$this->directoryId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->directoryId->tableName = "pixxio_file";
$this->directoryId->fieldName = "directory";
$this->directoryId->aliasFieldName = "pixxio_file_directory";
$this->directoryId->label = "Directory";
$this->directoryId->allowNullValue = false;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_file";
$this->importStatus->externalTableName = "pixxio_file";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_file_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_file";
$this->active->externalTableName = "pixxio_file";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_file_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType($this, "pixxio_file_mediaspace");
$this->mediaspace->tableName = "pixxio_file";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_file_mediaspace";
$this->mediaspace->label = "Mediaspace";
}
return $this;
}
public function loadDirectory() {
if ($this->directory == null) {
$this->directory = new \LuzernTourismus\Pixxio\Data\Directory\DirectoryExternalType($this, "pixxio_file_directory");
$this->directory->tableName = "pixxio_file";
$this->directory->fieldName = "directory";
$this->directory->aliasFieldName = "pixxio_file_directory";
$this->directory->label = "Directory";
}
return $this;
}
}