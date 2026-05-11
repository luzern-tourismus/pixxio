<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Directory\Directory;
use LuzernTourismus\Pixxio\Data\Directory\DirectoryUpdate;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Json\Directory\DirecotryJsonReader;
use Nemundo\Core\Base\Import\AbstractImport;

class DirectoryImport extends AbstractImport
{

    public function importData()
    {

        $update = new DirectoryUpdate();
        $update->importStatus = false;
        $update->update();

        $mediaspaceReader = new MediaspaceReader();
        foreach ($mediaspaceReader->getData() as $mediaspaceRow) {

            $page = 1;

            do {

                $count = 0;

                $direcotryJsonReader = new DirecotryJsonReader();
                $direcotryJsonReader->subdomain = $mediaspaceRow->url;
                $direcotryJsonReader->apiKey = $mediaspaceRow->apiKey;
                $direcotryJsonReader->page = $page;
                foreach ($direcotryJsonReader->getData() as $directoryJsonRow) {

                    $data = new Directory();
                    $data->updateOnDuplicate = true;
                    $data->id = $directoryJsonRow->id;
                    $data->importStatus = true;
                    $data->active = true;
                    $data->directory = $directoryJsonRow->directory;
                    $data->mediaspaceId = $mediaspaceRow->id;
                    $data->save();

                    $count++;

                }

                $page++;

            } while ($count > 0);


        }

        $update = new DirectoryUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();


    }

}