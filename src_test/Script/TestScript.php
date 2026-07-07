<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Data\File\FileDelete;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueDelete;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueUpdate;
use LuzernTourismus\Pixxio\Import\CustomMetadataImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Json\File\FileJsonItem;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\Pixxio\Script\CleanScript;
use LuzernTourismus\Pixxio\Script\FileImportScript;
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


        (new FileDelete())->delete();
        (new MetadataOptionValueDelete())->delete();


        $reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
        $reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        //$reader->filterByCollectionId = 1866091533;
        $reader->pageSize = 1;  // 500;

        $n = 0;

        foreach ($reader->getData() as $file) {

            (new FileImport())->importFile($file,1);

            (new \Nemundo\Core\Debug\Debug())->write($file->fileName);
            (new \Nemundo\Core\Debug\Debug())->write($file);
            $n++;
        }

        (new Debug())->write('Count: ' . $n);



        /*(new CleanScript())->run();

        (new CustomMetadataImport())->importData();

        (new FileImport())->importData();*/


    }
}