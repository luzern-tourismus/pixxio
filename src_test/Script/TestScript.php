<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Data\Webhook\WebhookDelete;
use LuzernTourismus\Pixxio\Setup\MediaspaceSetup;
use LuzernTourismus\PixxioTest\Json\FileJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\TrashJsonTest;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class TestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-test';
    }

    public function run()
    {

        (new TrashJsonTest())->runTest();


        //(new WebhookDelete())->delete();
        //$id = 989429490;
        /*(new MediaspaceSetup())
            ->addMediaspaceConfig(new MediaspaceConfigTest());

        (new FileJsonReaderTest())->runTest();*/


        //(new DirecctoryJsonReaderTest())->runTest();
        //(new FileJsonReaderTest())->runTest();
        //(new FileUploadTest())->runTest();
        //(new DirecctoryReaderTest())->runTest();

    }
}