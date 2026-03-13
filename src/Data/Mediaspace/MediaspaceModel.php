<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $url;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $apiKey;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $mediaspace;

protected function loadModel() {
$this->tableName = "pixxio_mediaspace";
$this->aliasTableName = "pixxio_mediaspace";
$this->label = "Mediaspace";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "pixxio_mediaspace";
$this->id->externalTableName = "pixxio_mediaspace";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "pixxio_mediaspace_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->url = new \Nemundo\Model\Type\Text\TextType($this);
$this->url->tableName = "pixxio_mediaspace";
$this->url->externalTableName = "pixxio_mediaspace";
$this->url->fieldName = "url";
$this->url->aliasFieldName = "pixxio_mediaspace_url";
$this->url->label = "Url";
$this->url->allowNullValue = false;
$this->url->length = 255;

$this->apiKey = new \Nemundo\Model\Type\Text\TextType($this);
$this->apiKey->tableName = "pixxio_mediaspace";
$this->apiKey->externalTableName = "pixxio_mediaspace";
$this->apiKey->fieldName = "api_key";
$this->apiKey->aliasFieldName = "pixxio_mediaspace_api_key";
$this->apiKey->label = "Api Key";
$this->apiKey->allowNullValue = false;
$this->apiKey->length = 255;

$this->mediaspace = new \Nemundo\Model\Type\Text\TextType($this);
$this->mediaspace->tableName = "pixxio_mediaspace";
$this->mediaspace->externalTableName = "pixxio_mediaspace";
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->aliasFieldName = "pixxio_mediaspace_mediaspace";
$this->mediaspace->label = "Mediaspace";
$this->mediaspace->allowNullValue = false;
$this->mediaspace->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "url";
$index->addType($this->url);

}
}