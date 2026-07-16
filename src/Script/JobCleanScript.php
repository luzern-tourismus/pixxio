<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use LuzernTourismus\Pixxio\Clean\JobClean;
use LuzernTourismus\Pixxio\Data\Job\JobDelete;
use LuzernTourismus\Pixxio\Data\Job\JobModel;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Model\Setup\ModelSetup;

class JobCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-job-clean';
    }

    public function run()
    {

        $table = new ModelSetup();
        $table->model = new JobModel();
        $table->dropTable();

        //(new JobClean())->clean();
        //(new JobDelete())->delete();

    }
}