<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Data\File\FileDelete;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueDelete;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueUpdate;
use LuzernTourismus\Pixxio\Data\User\UserDelete;
use LuzernTourismus\Pixxio\Import\CustomMetadataImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Import\UserImport;
use LuzernTourismus\Pixxio\Json\File\FileJsonItem;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\Pixxio\Script\CleanScript;
use LuzernTourismus\Pixxio\Script\FileImportScript;
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

        //(new UserDelete())->delete();

        //(new UserImport())->importData();

        $json = new JobJsonReader();
        $json->fromMediaspaceConfig(new MediaspaceConfigTest());
        $json->getJob(25874351);







    }
}