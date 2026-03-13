<?php
namespace LuzernTourismus\Pixxio\Data\Mediaspace;
class MediaspaceExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = MediaspaceModel::class;
$this->externalTableName = "pixxio_mediaspace";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->url = new \Nemundo\Model\Type\Text\TextType();
$this->url->fieldName = "url";
$this->url->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->url->externalTableName = $this->externalTableName;
$this->url->aliasFieldName = $this->url->tableName . "_" . $this->url->fieldName;
$this->url->label = "Url";
$this->addType($this->url);

$this->apiKey = new \Nemundo\Model\Type\Text\TextType();
$this->apiKey->fieldName = "api_key";
$this->apiKey->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->apiKey->externalTableName = $this->externalTableName;
$this->apiKey->aliasFieldName = $this->apiKey->tableName . "_" . $this->apiKey->fieldName;
$this->apiKey->label = "Api Key";
$this->addType($this->apiKey);

$this->mediaspace = new \Nemundo\Model\Type\Text\TextType();
$this->mediaspace->fieldName = "mediaspace";
$this->mediaspace->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspace->externalTableName = $this->externalTableName;
$this->mediaspace->aliasFieldName = $this->mediaspace->tableName . "_" . $this->mediaspace->fieldName;
$this->mediaspace->label = "Mediaspace";
$this->addType($this->mediaspace);

}
}