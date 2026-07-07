<?php
namespace LuzernTourismus\Pixxio\Data\CollectionFile;
class CollectionFileModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $collectionId;

/**
* @var \LuzernTourismus\Pixxio\Data\Collection\CollectionExternalType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType
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

protected function loadModel() {
$this->tableName = "pixxio_collection_file";
$this->aliasTableName = "pixxio_collection_file";
$this->label = "Collection File";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_collection_file";
$this->id->externalTableName = "pixxio_collection_file";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_collection_file_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->collectionId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->collectionId->tableName = "pixxio_collection_file";
$this->collectionId->fieldName = "collection";
$this->collectionId->aliasFieldName = "pixxio_collection_file_collection";
$this->collectionId->label = "Collection";
$this->collectionId->allowNullValue = false;

$this->fileId = new \Nemundo\Model\Type\External\Id\LargeNumberExternalIdType($this);
$this->fileId->tableName = "pixxio_collection_file";
$this->fileId->fieldName = "file";
$this->fileId->aliasFieldName = "pixxio_collection_file_file";
$this->fileId->label = "File";
$this->fileId->allowNullValue = false;

$this->active = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->active->tableName = "pixxio_collection_file";
$this->active->externalTableName = "pixxio_collection_file";
$this->active->fieldName = "active";
$this->active->aliasFieldName = "pixxio_collection_file_active";
$this->active->label = "Active";
$this->active->allowNullValue = false;

$this->importStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->importStatus->tableName = "pixxio_collection_file";
$this->importStatus->externalTableName = "pixxio_collection_file";
$this->importStatus->fieldName = "import_status";
$this->importStatus->aliasFieldName = "pixxio_collection_file_import_status";
$this->importStatus->label = "Import Status";
$this->importStatus->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "collection_file";
$index->addType($this->collectionId);
$index->addType($this->fileId);

}
public function loadCollection() {
if ($this->collection == null) {
$this->collection = new \LuzernTourismus\Pixxio\Data\Collection\CollectionExternalType($this, "pixxio_collection_file_collection");
$this->collection->tableName = "pixxio_collection_file";
$this->collection->fieldName = "collection";
$this->collection->aliasFieldName = "pixxio_collection_file_collection";
$this->collection->label = "Collection";
}
return $this;
}
public function loadFile() {
if ($this->file == null) {
$this->file = new \LuzernTourismus\Pixxio\Data\File\FileExternalType($this, "pixxio_collection_file_file");
$this->file->tableName = "pixxio_collection_file";
$this->file->fieldName = "file";
$this->file->aliasFieldName = "pixxio_collection_file_file";
$this->file->label = "File";
}
return $this;
}
}