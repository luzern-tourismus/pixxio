<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Data\Webhook\WebhookDelete;
use LuzernTourismus\Pixxio\Import\CommentImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Import\UserImport;
use LuzernTourismus\Pixxio\Json\Comment\CommentJsonReader;
use LuzernTourismus\Pixxio\Json\File\FileJson;
use LuzernTourismus\Pixxio\Json\File\FileJsonItem;
use LuzernTourismus\Pixxio\Json\User\UserJsonReader;
use LuzernTourismus\Pixxio\Setup\MediaspaceSetup;
use LuzernTourismus\PixxioTest\Json\CommentJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\DirecctoryJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\FileJsonReaderTest;
use LuzernTourismus\PixxioTest\Json\TrashJsonTest;
use LuzernTourismus\PixxioTest\Json\UserJsonReaderTest;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;

class TestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-test';
    }

    public function run()
    {


$fileId = 1948276688;


        $file = new FileJson();
        $file->fromMediaspaceConfig(new MediaspaceConfigTest());
        $fileItem = $file->getFile($fileId);

        (new FileImport())->importFile($fileItem, (new MediaspaceConfigTest())->getMediaspaceId());

        //(new Debug())->write($fileItem);


        /*$import = new UserImport();
        $import->fromMediaspaceConfig(new MediaspaceConfigTest());
        $import->importData();*/


        //(new UserJsonReaderTest())->runTest();
        //(new CommentJsonReaderTest())->runTest();
        /*(new UserImport())->importData();
        (new CommentImport())->importComment(905096681);*/


        /*$reader = new CommentJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $reader->fileId = 905096681;
        foreach ($reader->getData() as $commentRow) {
            (new \Nemundo\Core\Debug\Debug())->write($commentRow->comment);
        }*/

        //(new TrashJsonTest())->runTest();


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