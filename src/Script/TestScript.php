<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Import\CustomMetadataImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class TestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-test';
    }

    public function run()
    {

        (new CustomMetadataImport())->importData();

    }
}