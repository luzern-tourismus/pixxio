<?php
namespace LuzernTourismus\Pixxio\Data\Directory;
class DirectoryExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $directory;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $mediaspaceId;

/**
* @var \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceExternalType
*/
public $mediaspace;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = DirectoryModel::class;
$this->externalTableName = "pixxio_directory";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->directory = new \Nemundo\Model\Type\Text\TextType();
$this->directory->fieldName = "directory";
$this->directory->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->directory->externalTableName = $this->externalTableName;
$this->directory->aliasFieldName = $this->directory->tableName . "_" . $this->directory->fieldName;
$this->directory->label = "Directory";
$this->addType($this->directory);

$this->mediaspaceId = new \Nemundo\Model\Type\Id\IdType();
$this->mediaspaceId->fieldName = "mediaspace";
$this->mediaspaceId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->mediaspaceId->aliasFieldName = $this->mediaspaceId->tableName ."_".$this->mediaspaceId->fieldName;
$this->mediaspaceId->label = "Mediaspace";
$this->addType($this->mediaspaceId);

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
}