<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Delete\TrashDelete;
use LuzernTourismus\Pixxio\Import\CollectionFileImport;
use LuzernTourismus\Pixxio\Import\CollectionImport;
use LuzernTourismus\Pixxio\Import\CustomMetadataImport;
use LuzernTourismus\Pixxio\Import\DirectoryImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Import\PixxioImport;
use LuzernTourismus\Pixxio\Import\UserImport;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class ImportScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-import';
    }

    public function run()
    {

        (new PixxioImport())->importData();
        (new TrashDelete())->deleteTrash();

        /*(new CustomMetadataImport())->importData();
        (new CollectionImport())->importData();
        (new CollectionFileImport())->importData();
        (new DirectoryImport())->importData();
        (new UserImport())->importData();
        (new FileImport())->importData();*/

    }
}