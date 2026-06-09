<?php

namespace LuzernTourismus\PixxioTest\Install;

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use LuzernTourismus\Pixxio\Data\PixxioModelCollection;
use LuzernTourismus\Pixxio\Scheduler\ImportScheduler;
use LuzernTourismus\Pixxio\Script\CleanScript;
use LuzernTourismus\Pixxio\Script\CustommetadataImportScript;
use LuzernTourismus\Pixxio\Script\DirectoryImportScript;
use LuzernTourismus\Pixxio\Script\ImportScript;
use LuzernTourismus\Pixxio\Script\JobCleanScript;
use LuzernTourismus\Pixxio\Script\JobUpdateScript;

use LuzernTourismus\Pixxio\Usergroup\PixxioUsergroup;
use LuzernTourismus\PixxioTest\Script\TestScript;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class PixxioTestInstall extends AbstractInstall
{
    public function install()
    {

        (new ScriptSetup(new PixxioApplication()))
            ->addScript(new TestScript());

    }
}