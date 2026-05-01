<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Import\CollectionImport;
use LuzernTourismus\Pixxio\Import\CustomMetadataImport;
use LuzernTourismus\Pixxio\Import\DirectoryImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class ImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-import';
    }

    public function run()
    {

        (new CustomMetadataImport())->importData();
        (new CollectionImport())->importData();
        (new DirectoryImport())->importData();
        (new FileImport())->importData();

    }
}