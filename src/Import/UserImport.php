<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\User\User;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\Json\User\UserJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Core\Base\Import\AbstractImport;

class UserImport extends AbstractImport
{

    use MediaspaceConfigTrait;

    public function importData() {

        $reader = new UserJsonReader();
        $reader->subdomain = $this->subdomain;
        $reader->apiKey = $this->apiKey;
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        foreach ($reader->getData() as $item) {
            //(new \Nemundo\Core\Debug\Debug())->write($item);

            $data = new User();
            $data->updateOnDuplicate=true;
            $data->id = $item->id;
            $data->userName= $item->userName;
            $data->displayName= $item->displayName;
            $data->save();


        }


    }

}