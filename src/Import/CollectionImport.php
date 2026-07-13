<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Collection\Collection;
use LuzernTourismus\Pixxio\Data\Collection\CollectionUpdate;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow;
use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReader;

class CollectionImport extends AbstractMediaspaceImport
{


    protected function beforeImport()
    {

        $update = new CollectionUpdate();
        $update->importStatus = false;
        $update->update();


    }


    protected function afterImport()
    {

        $update = new CollectionUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

    }


    protected function onMediaspace(MediaspaceRow $mediaspaceRow)
    {

        $page = 1;

        do {

            $count = 0;

            $collectionJsonReader = new CollectionJsonReader();
            $collectionJsonReader->subdomain = $mediaspaceRow->url;
            $collectionJsonReader->apiKey = $mediaspaceRow->apiKey;
            $collectionJsonReader->page = $page;
            $collectionJsonReader->pageSize = 30;// 100;
            foreach ($collectionJsonReader->getData() as $collectionJsonRow) {

                $data = new Collection();
                $data->updateOnDuplicate = true;
                $data->id = $collectionJsonRow->id;
                $data->importStatus = true;
                $data->active = true;
                $data->mediaspaceId = $mediaspaceRow->id;
                $data->collection = $collectionJsonRow->collection;
                $data->userId = $collectionJsonRow->userId;
                $data->dynamicCollection = $collectionJsonRow->dynamicCollection;
                $data->save();

                $count++;

            }

            $page++;

        } while ($count > 0);


        /*    $jsonReader = new FileJsonReaderJson();
            $jsonReader->subdomain = $mediaspaceRow->url;
            $jsonReader->apiKey = $mediaspaceRow->apiKey;
            $jsonReader->pageSize = 100;  // 500;

            do {

                foreach ($jsonReader->getData() as $file) {
                    $this->importFile($file, $mediaspaceRow->id);
                }

            } while ($jsonReader->hasCursor());*/


        /*
                $jsonReader = new FileJsonReaderJson();
                $jsonReader->subdomain = $mediaspaceRow->url;
                $jsonReader->apiKey = $mediaspaceRow->apiKey;
                $jsonReader->pageSize = 100;  // 500;

                do {

                    foreach ($jsonReader->getData() as $file) {
                        $this->importFile($file, $mediaspaceRow->id);
                    }

                } while ($jsonReader->hasCursor());*/


    }

}