<?php

namespace LuzernTourismus\PixxioTest\Script;

use LuzernTourismus\Pixxio\Data\Job\JobModel;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\Pixxio\Reader\File\FileDataReader;
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



        $reader = new FileDataReader();
        foreach ($reader->getData() as $fileRow) {


            (new Debug())->write($fileRow->id);


            $metaReader = $fileRow->getMetadataReader();
            $metaReader->filter->andEqual($metaReader->model->metadataId,540987239);
            foreach ($metaReader->getData() as $metaRow) {
                (new Debug())->write($metaRow->value);
            }


        }





    }
}