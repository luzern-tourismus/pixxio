<?php

namespace LuzernTourismus\Pixxio\Import;

use Nemundo\Core\Base\Import\AbstractImport;

class PixxioImport extends AbstractImport
{

    public function importData()
    {

        (new CustomMetadataImport())->importData();
        (new CollectionImport())->importData();
        (new CollectionFileImport())->importData();
        (new DirectoryImport())->importData();
        (new UserImport())->importData();
        (new FileImport())->importData();

    }

}