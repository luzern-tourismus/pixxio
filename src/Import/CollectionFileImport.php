<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\CollectionFile\CollectionFile;
use LuzernTourismus\Pixxio\Data\CollectionFile\CollectionFileUpdate;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\Pixxio\Reader\Collection\CollectionDataReader;

class CollectionFileImport extends AbstractMediaspaceImport
{


    protected function beforeImport()
    {

        $update = new CollectionFileUpdate();
        $update->importStatus = false;
        $update->update();


    }


    protected function afterImport()
    {

        $update = new CollectionFileUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

    }


    protected function onMediaspace(MediaspaceRow $mediaspaceRow)
    {

        $reader = new CollectionDataReader();
        $reader->filterByMediaspace($mediaspaceRow->id);
        $reader->filter->andEqual($reader->model->active, true);
        foreach ($reader->getData() as $collectionRow) {

            $reader = new FileJsonReaderJson();
            $reader->subdomain = $mediaspaceRow->url;
            $reader->apiKey = $mediaspaceRow->apiKey;
            $reader->filterByCollectionId = $collectionRow->id;
            $reader->pageSize = 500;

            foreach ($reader->getData() as $file) {

                $data = new CollectionFile();
                $data->updateOnDuplicate = true;
                $data->active = true;
                $data->importStatus = true;
                $data->collectionId = $collectionRow->id;
                $data->fileId = $file->id;
                $data->save();

            }

        }

    }

}