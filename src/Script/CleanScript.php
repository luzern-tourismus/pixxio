<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class CleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-clean';
    }

    public function run()
    {

        (new PixxioApplication())->reinstallApp();

    }
}