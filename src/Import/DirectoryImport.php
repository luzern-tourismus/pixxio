<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Directory\Directory;
use LuzernTourismus\Pixxio\Data\Directory\DirectoryUpdate;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow;
use LuzernTourismus\Pixxio\Json\Directory\DirecotryJsonReader;
use Nemundo\Core\Base\Import\AbstractImport;
use Nemundo\Core\Debug\Debug;

class DirectoryImport extends AbstractMediaspaceImport  // AbstractImport
{


    protected function beforeImport()
    {

        $update = new DirectoryUpdate();
        $update->importStatus = false;
        $update->update();


    }

    protected function afterImport() {

        $update = new DirectoryUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();


    }


    protected function onMediaspace(MediaspaceRow $mediaspaceRow) {

        /*$update = new DirectoryUpdate();
        $update->importStatus = false;
        $update->update();*/

        /*$mediaspaceReader = new MediaspaceReader();
        foreach ($mediaspaceReader->getData() as $mediaspaceRow) {*/

            $page = 1;

            do {

                $count = 0;

                $direcotryJsonReader = new DirecotryJsonReader();
                $direcotryJsonReader->subdomain = $mediaspaceRow->url;
                $direcotryJsonReader->apiKey = $mediaspaceRow->apiKey;
                $direcotryJsonReader->page = $page;
                foreach ($direcotryJsonReader->getData() as $directoryJsonRow) {

                    //(new Debug())->write($directoryJsonRow);

                    $data = new Directory();
                    $data->updateOnDuplicate = true;
                    $data->id = $directoryJsonRow->id;
                    $data->importStatus = true;
                    $data->active = true;
                    $data->directory = $directoryJsonRow->directory;
                    $data->parentId = $directoryJsonRow->parentId;
                    $data->quantity = $directoryJsonRow->quantity;
                    $data->mediaspaceId = $mediaspaceRow->id;
                    $data->save();

                    $count++;

                }

                $page++;

            } while ($count > 0);

        //}


    }

}