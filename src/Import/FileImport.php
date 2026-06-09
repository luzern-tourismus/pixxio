<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Directory\Directory;
use LuzernTourismus\Pixxio\Data\File\File;
use LuzernTourismus\Pixxio\Data\FileKeyword\FileKeyword;
use LuzernTourismus\Pixxio\Data\Keyword\Keyword;
use LuzernTourismus\Pixxio\Data\Keyword\KeywordId;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use Nemundo\Core\Base\Import\AbstractImport;

class FileImport extends AbstractImport
{


    private $mediaspaceReader;

    public function __construct()
    {

        $this->mediaspaceReader = new MediaspaceReader();

    }


    public function filterByMediaspaceConfig(AbstractMediaspaceConfig $mediaspace)
    {

        $this->mediaspaceReader->filter->andEqual($this->mediaspaceReader->model->apiKey, $mediaspace->apiKey);
        return $this;

    }


    public function filterByMediaspaceId($mediaspaceId)
    {

        /*if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->filter->andEqual($this->model->idimediaspaceId, $mediaspaceId);
        }

        return $this;*/


    }


    public function importData()
    {


        //$mediaspaceReader = new MediaspaceReader();
        foreach ($this->mediaspaceReader->getData() as $mediaspaceRow) {


            $jsonReader = new FileJsonReaderJson();
            $jsonReader->subdomain = $mediaspaceRow->url;
            $jsonReader->apiKey = $mediaspaceRow->apiKey;

            do {

                foreach ($jsonReader->getData() as $file) {

                    $data = new File();
                    $data->updateOnDuplicate = true;
                    $data->id = $file->id;
                    $data->importStatus = true;
                    $data->active = true;
                    $data->mediaspaceId = $mediaspaceRow->id;
                    $data->filename = $file->filename;
                    $data->description = $file->description;
                    $data->fileUrl = $file->fileUrl;
                    $data->directoryId = $file->directoryId;
                    $data->creator = $file->creator;
                    $data->save();

                    foreach ($file->keywordList as $keyword) {

                        $data = new Keyword();
                        $data->ignoreIfExists = true;
                        $data->keyword = $keyword;
                        $data->save();

                        $id = new KeywordId();
                        $id->filter->andEqual($id->model->keyword, $keyword);
                        $keywordId = $id->getId();

                        $data = new FileKeyword();
                        $data->ignoreIfExists = true;
                        $data->fileId = $file->id;
                        $data->keywordId = $keywordId;
                        $data->save();


                    }


                    $data = new Directory();
                    $data->id = $file->directoryId;


                    /*$itemReader = new FileItemJsonReaderJson();
                    $itemReader->mediaSpace = $mediaspaceRow->url;
                    $itemReader->apiKey= $mediaspaceRow->apiKey;

                    $itemReader->id = $file->id;
                    foreach ( $itemReader->getData() as $fileItemJson) {

                        //$update = new FileUpdate();



                    }*/


                }

            } while ($jsonReader->hasCursor());

        }

    }

}