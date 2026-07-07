<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Import\CollectionFileImport;
use LuzernTourismus\Pixxio\Import\CollectionImport;
use LuzernTourismus\Pixxio\Import\DirectoryImport;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class CollectionImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-collection-import';
    }

    public function run()
    {

        (new CollectionImport())->importData();
        (new CollectionFileImport())->importData();

    }
}