<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Setup\MediaspaceSetup;
use LuzernTourismus\PixxioTest\FileUploadTest;
use LuzernTourismus\PixxioTest\Json\DirecctoryJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\FileJsonReaderTest;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Reader\DirecctoryReaderTest;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class TestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-test';
    }

    public function run()
    {

        (new MediaspaceSetup())
            ->addMediaspaceConfig(new MediaspaceConfigTest());

        //(new FileJsonReaderTest())->runTest();

        //(new FileUploadTest())->runTest();

        (new DirecctoryReaderTest())->runTest();

    }
}