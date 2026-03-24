<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Collection\Collection;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Json\Collection\CollectionJsonReaderJson;
use Nemundo\Core\Base\Import\AbstractImport;

class CollectionImport extends AbstractImport
{

    public function importData()
    {

        $mediaspaceReader = new MediaspaceReader();
        foreach ($mediaspaceReader->getData() as $mediaspaceRow) {

            $collectionJsonReader = new CollectionJsonReaderJson();
            $collectionJsonReader->subdomain = $mediaspaceRow->url;
            $collectionJsonReader->apiKey= $mediaspaceRow->apiKey;
            foreach ($collectionJsonReader->getData() as $collectionJsonRow) {

                $data = new Collection();
                $data->updateOnDuplicate=true;
                $data->id = $collectionJsonRow->id;
                $data->mediaspaceId=$mediaspaceRow->id;
                $data->collection = $collectionJsonRow->collection;
                $data->save();


            }

        }

    }

}