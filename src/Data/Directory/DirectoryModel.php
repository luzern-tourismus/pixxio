<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $directory;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $importStatus;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

protected function loadModel() {
$this->tableName = "pixxio_directory";
$this->aliasTableName = "pixxio_directory";
$this->label = "Directory";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_directory";
$this->id->externalTableName = "pixxio_directory";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_directory_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->directory = new \Nemundo\Model\Type\Text\TextType($this);
$this->directory->tableName = "pixxio_directory";
$this->directory->externalTableName = "pixxio_directory";
$this->directory->fieldName = "directory";
$this->directory->aliasFieldName = "pixxio_directory_directory";
$this->directory->label = "Directory";
$this->directory->allowNullValue = true;
$this->directory->length = 255;

$this->mediaspaceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mediaspaceId->tableName = "pixxio_directory";
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->aliasFieldName = "pixxio_directory_mediaspace";
$this->mediaspaceId->label = "Mediaspace";
$this->mediaspaceId->allowNullValue = false;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_directory";
$this->importStatus->externalTableName = "pixxio_directory";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_directory_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_directory";
$this->active->externalTableName = "pixxio_directory";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_directory_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType($this, "pixxio_directory_mediaspace");
$this->mediaspace->tableName = "pixxio_directory";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_directory_mediaspace";
$this->mediaspace->label = "Mediaspace";
}
return $this;
}
}