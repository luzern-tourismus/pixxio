<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Model\Setup\ModelSetup;

class TestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-test';
    }

    public function run()
    {




       // $model = new ModelSetup())->createTable()


        /*$n = 0;

        $reader = new FileJsonReaderJson();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $reader->filterByDirectoryId = 198885700;
        $reader->pageSize = 500;

        do {

            foreach ($reader->getData() as $file) {

                /*(new Debug())->write($file->id);
                (new Debug())->write($file->fileName);*/

                //(new FileJsonDelete())->fromMediaspaceConfig(new MediaspaceConfigTest())->deleteFile($file->id);

                $n++;

        /*    }

            (new Debug())->write($n);

        } while ($reader->hasCursor());


        //(new UserDelete())->delete();

        //(new UserImport())->importData();

        /*$json = new JobJsonReader();
        $json->fromMediaspaceConfig(new MediaspaceConfigTest());
        $json->getJob(25871925);
*/


    }
}