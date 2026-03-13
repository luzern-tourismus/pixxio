<?php

namespace LuzernTourismus\Pixxio\Application;

use LuzernTourismus\Pixxio\Data\PixxioModelCollection;
use LuzernTourismus\Pixxio\Install\PixxioInstall;
use LuzernTourismus\Pixxio\Install\PixxioUninstall;
use LuzernTourismus\Pixxio\Site\PixxioSite;
use Nemundo\App\Application\Type\AbstractApplication;

class PixxioApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Pixxio';
        $this->applicationId = '7772b8b4-5597-49a7-b53b-505d8b629aa4';
        $this->modelCollectionClass = PixxioModelCollection::class;
        $this->installClass = PixxioInstall::class;
        $this->uninstallClass = PixxioUninstall::class;
        $this->appSiteClass = PixxioSite::class;
    }
}