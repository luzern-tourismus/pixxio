<?php
namespace LuzernTourismus\Pixxio\Data\Collection;
class CollectionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $collection;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

protected function loadModel() {
$this->tableName = "pixxio_collection";
$this->aliasTableName = "pixxio_collection";
$this->label = "Collection";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_collection";
$this->id->externalTableName = "pixxio_collection";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_collection_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->collection = new \Nemundo\Model\Type\Text\TextType($this);
$this->collection->tableName = "pixxio_collection";
$this->collection->externalTableName = "pixxio_collection";
$this->collection->fieldName = "collection";
$this->collection->aliasFieldName = "pixxio_collection_collection";
$this->collection->label = "Collection";
$this->collection->allowNullValue = false;
$this->collection->length = 255;

$this->mediaspaceId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->mediaspaceId->tableName = "pixxio_collection";
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->aliasFieldName = "pixxio_collection_mediaspace";
$this->mediaspaceId->label = "Mediaspace";
$this->mediaspaceId->allowNullValue = false;

}
public function loadMediaspace() {
if ($this->mediaspace == null) {
$this->mediaspace = new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType($this, "pixxio_collection_mediaspace");
$this->mediaspace->tableName = "pixxio_collection";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_collection_mediaspace";
$this->mediaspace->label = "Mediaspace";
}
return $this;
}
}