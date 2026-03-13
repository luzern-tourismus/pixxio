<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Directory\Directory;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Json\Directory\DirecotryJsonReader;
use Nemundo\Core\Base\Import\AbstractImport;

class DirectoryImport extends AbstractImport
{

    public function importData()
    {

        $mediaspaceReader = new MediaspaceReader();
        foreach ($mediaspaceReader->getData() as $mediaspaceRow) {

            $page = 1;

            do {

                $count = 0;

                $direcotryJsonReader = new DirecotryJsonReader();
                $direcotryJsonReader->mediaSpace = $mediaspaceRow->url;
                $direcotryJsonReader->apiKey = $mediaspaceRow->apiKey;
                $direcotryJsonReader->page = $page;
                foreach ($direcotryJsonReader->getData() as $directoryJsonRow) {

                    $data = new Directory();
                    $data->updateOnDuplicate = true;
                    $data->id = $directoryJsonRow->id;
                    $data->directory = $directoryJsonRow->directory;
                    $data->mediaspaceId = $mediaspaceRow->id;
                    $data->save();

                    $count++;

                }

                $page++;

            } while ($count>0);


        }

    }

}