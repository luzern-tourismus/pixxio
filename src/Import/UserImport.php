<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataUpdate;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow;
use LuzernTourismus\Pixxio\Data\User\User;
use LuzernTourismus\Pixxio\Data\User\UserUpdate;
use LuzernTourismus\Pixxio\Json\User\UserJsonReader;

class UserImport extends AbstractMediaspaceImport
{

    //use MediaspaceConfigTrait;


    protected function beforeImport()
    {

        $update = new UserUpdate();
        $update->importStatus = false;
        $update->update();


    }


    protected function afterImport() {

        $update = new UserUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

    }



    protected function onMediaspace(MediaspaceRow $mediaspaceRow)
    {

        $reader = new UserJsonReader();
        $reader->subdomain = $mediaspaceRow->url;
        $reader->apiKey = $mediaspaceRow->apiKey;
        foreach ($reader->getData() as $item) {
            //(new \Nemundo\Core\Debug\Debug())->write($item);

            $data = new User();
            $data->updateOnDuplicate = true;
            $data->id = $item->id;
            $data->importStatus = true;
            $data->active = true;
            $data->userName = $item->userName;
            $data->displayName = $item->displayName;
            $data->mediaspaceId = $mediaspaceRow->id;
            $data->save();


        }


    }


}