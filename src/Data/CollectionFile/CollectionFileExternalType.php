<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $collectionId;

/**
* @var \LuzernTourismus\Pixxio\Data\Collection\CollectionExternalType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $fileId;

/**
* @var \LuzernTourismus\Pixxio\Data\File\FileExternalType
*/
public $file;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $active;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $importStatus;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = CollectionFileModel::class;
$this->externalTableName = "pixxio_collection_file";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->collectionId = new \Nemundo\Model\Type\Id\IdType();
$this->collectionId->fieldName = "collection";
$this->collectionId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->collectionId->aliasFieldName = $this->collectionId->tableName ."_".$this->collectionId->fieldName;
$this->collectionId->label = "Collection";
$this->addType($this->collectionId);

$this->fileId = new \Nemundo\Model\Type\Id\IdType();
$this->fileId->fieldName = "file";
$this->fileId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->fileId->aliasFieldName = $this->fileId->tableName ."_".$this->fileId->fieldName;
$this->fileId->label = "File";
$this->addType($this->fileId);

$this->active = new \Nemundo\Model\Type\Number\YesNoType();
$this->active->fieldName = "active";
$this->active->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->active->externalTableName = $this->externalTableName;
$this->active->aliasFieldName = $this->active->tableName . "_" . $this->active->fieldName;
$this->active->label = "Active";
$this->addType($this->active);

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->importStatus->fieldName = "import_status";
$this->importStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->importStatus->externalTableName = $this->externalTableName;
$this->importStatus->aliasFieldName = $this->importStatus->tableName . "_" . $this->importStatus->fieldName;
$this->importStatus->label = "Import Status";
$this->addType($this->importStatus);

}
public function loadCollection() {
if ($this->collection == null) {
$this->collection = new \LuzernTourismus\Pixxio\Data\Collection\CollectionExternalType(null, $this->parentFieldName . "_collection");
$this->collection->fieldName = "collection";
$this->collection->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->collection->aliasFieldName = $this->collection->tableName ."_".$this->collection->fieldName;
$this->collection->label = "Collection";
$this->addType($this->collection);
}
return $this;
}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType(null, $this->parentFieldName . "_file");
$this->file->fieldName = "file";
$this->file->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->file->aliasFieldName = $this->file->tableName ."_".$this->file->fieldName;
$this->file->label = "File";
$this->addType($this->file);
}
return $this;
}
}