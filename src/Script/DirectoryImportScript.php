<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Import\CollectionImport;
use LuzernTourismus\Pixxio\Import\DirectoryImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class DirectoryImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-directory-import';
    }

    public function run()
    {

        (new DirectoryImport())->importData();

    }
}