<?php

namespace LuzernTourismus\Pixxio\Setup;

use LuzernTourismus\Pixxio\Data\Mediaspace\Mediaspace;
use Nemundo\Core\Base\AbstractBase;

class MediaspaceSetup extends AbstractBase
{

    public function addMediaspace($mediaspace,$url, $apiKey)
    {

        $data = new Mediaspace();
        $data->updateOnDuplicate = true;
        $data->mediaspace = $mediaspace;
        $data->url = $url;
        $data->apiKey = $apiKey;
        $data->save();

        return $this;

    }

}