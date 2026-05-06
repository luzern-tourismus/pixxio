<?php

namespace LuzernTourismus\PixxioTest;

use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use Nemundo\Project\Config\ProjectConfigReader;

class MediaspaceConfigTest extends AbstractMediaspaceConfig
{

    protected function loadMediaspace()
    {

        $this->subdomain = (new ProjectConfigReader())->getValue('pixxio_subdomain');
        $this->apiKey = (new ProjectConfigReader())->getValue('pixxio_api');

    }

}