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

        /*}


        public function importData()
        {

            $mediaspaceReader = new MediaspaceReader();
            foreach ($mediaspaceReader->getData() as $mediaspaceRow) {*/

        $collectionJsonReader = new CollectionJsonReader();
        $collectionJsonReader->subdomain = $mediaspaceRow->url;
        $collectionJsonReader->apiKey = $mediaspaceRow->apiKey;
        foreach ($collectionJsonReader->getData() as $collectionJsonRow) {

            $data = new Collection();
            $data->updateOnDuplicate = true;
            $data->id = $collectionJsonRow->id;
            $data->importStatus = true;
            $data->active = true;
            $data->mediaspaceId = $mediaspaceRow->id;
            $data->collection = $collectionJsonRow->collection;
            $data->save();


        }

        //}

    }

}