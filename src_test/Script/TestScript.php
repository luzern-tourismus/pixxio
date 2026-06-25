<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Import\CommentImport;
use LuzernTourismus\Pixxio\Import\DirectoryImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Import\UserImport;
use LuzernTourismus\Pixxio\Json\File\FileJson;
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

        //(new UserImport())->importData();


        $id = 1976817110;
        $import =  new CommentImport();
        $import->fromMediaspaceConfig(new MediaspaceConfigTest());
        $import->importComment($id);


        /*(new DirectoryImport())->importData();
        $id = 1976817110;*/



        /*$fileId = 1948276688;


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