<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Config\EditTypeConfig;
use Nemundo\Core\Base\AbstractBase;

class FileJsonItem extends AbstractBase
{

    public $id;

    public $subject;

    public $fileName;

    public $fileSize;

    public $fileExtension;

    public $fileUrl;

    public $description;

    public $directoryId;

    public $creator;

    public $keywordList = [];

    /**
     * @var FileCustomMetadataItem[]
     */
    public $metadataList = [];


    public function __construct($json)
    {

        $this->id = $json['id'];
        $this->subject = $json['subject'];
        $this->fileName = $json['fileName'];
        $this->fileExtension = $json['fileExtension'];
        $this->fileSize = $json['fileSize'];
        $this->fileUrl = $json['originalFileURL'];
        $this->description = $json['description'];
        $this->keywordList = $json['keywords'];
        $this->creator = $json['creator'];
        $this->directoryId = $json['directory']['id'];

        //importantMetadata

        foreach ($json['importantMetadata'] as $metadata) {

            $editType = $metadata['editType'];

            $metadataItem = new FileCustomMetadataItem();
            $metadataItem->id = $metadata['id'];
            $metadataItem->editType = $editType;  // $metadata['editType'];

            if ($editType == EditTypeConfig::TEXT) {
                if (isset($metadata['value'])) {
                    $metadataItem->value = $metadata['value'];
                }
            }


            if ($editType == EditTypeConfig::SELECTION) {
                if (isset($metadata['value']['id'])) {
                    $metadataItem->value = $metadata['value']['id'];
                }
            }


            if ($editType == EditTypeConfig::MULTISELECTION) {

                if (isset($metadata['value'])) {

                    foreach ($metadata['value'] as $value) {
                        $metadataItem->valueList[] = $value['id'];
                    }
                }

                /*                if (isset($metadata['value']['id'])) {
                                    $metadataItem->value = $metadata['value']['id'];
                                }*/
            }


            /*      "id": 989301806,
              "name": "Nutzungsrecht",
              "editType": "selection",
              "type": "custom",
              "isEditable": true,
              "selectionOptions": [
                {
                    "id": 233572193,
                  "name": "Für Verwendung LTAG",
                  "order": "n"
                },
                {
                    "id": 642912341,
                  "name": "Für touristische Zwecke",
                  "order": "u"
                },
                {
                    "id": 2143484185,
                  "name": "Für internen Gebrauch",
                  "order": "x"
                }
              ],
              "translationState": [],
              "value": {
                      "id": 642912341,
                "name": "Für touristische Zwecke",
                "order": "u"
              }*/


            $this->metadataList[] = $metadataItem;

        }

    }


    public function getMetadataList()
    {

        return $this->metadataList;

    }


}