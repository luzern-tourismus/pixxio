<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use LuzernTourismus\Pixxio\Data\Job\JobDelete;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class JobCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-job-clean';
    }

    public function run()
    {

        (new JobDelete())->delete();

    }
}