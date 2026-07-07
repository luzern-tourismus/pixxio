<?php

namespace LuzernTourismus\Pixxio\Setup;

use LuzernTourismus\Pixxio\Data\Mediaspace\Mediaspace;
use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use Nemundo\Core\Base\AbstractBase;

class MediaspaceSetup extends AbstractBase
{


    public function addMediaspaceConfig(AbstractMediaspaceConfig $mediaspaceConfig)
    {

        $this->addMediaspace($mediaspaceConfig->url, $mediaspaceConfig->apiKey);
        return $this;

    }


    public function addMediaspace($url, $apiKey)
    {

        $data = new Mediaspace();
        $data->updateOnDuplicate = true;
        //$data->mediaspace = $mediaspace;
        $data->url = $url;
        $data->apiKey = $apiKey;
        $data->save();

        return $this;

    }

}