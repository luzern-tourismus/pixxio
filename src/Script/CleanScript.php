<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use LuzernTourismus\Pixxio\Data\File\FileDelete;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Setup\MediaspaceSetup;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class CleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-clean';
    }

    public function run()
    {

        $mediaspaceData = (new MediaspaceReader())->getData();

        (new PixxioApplication())->reinstallApp();

        foreach ($mediaspaceData as $mediaspaceRow) {

            (new MediaspaceSetup())->addMediaspace($mediaspaceRow->url, $mediaspaceRow->apiKey);

        }

        //(new FileDelete())->delete();

    }
}