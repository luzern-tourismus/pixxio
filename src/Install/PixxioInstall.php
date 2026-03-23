<?php

namespace LuzernTourismus\Pixxio\Install;

use LuzernTourismus\Pixxio\Application\PixxioApplication;
use LuzernTourismus\Pixxio\Data\PixxioModelCollection;
use LuzernTourismus\Pixxio\Scheduler\ImportScheduler;
use LuzernTourismus\Pixxio\Script\CleanScript;
use LuzernTourismus\Pixxio\Script\DirectoryImportScript;
use LuzernTourismus\Pixxio\Script\ImportScript;
use LuzernTourismus\Pixxio\Script\TestScript;
use LuzernTourismus\Pixxio\Usergroup\PixxioUsergroup;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Scheduler\Setup\SchedulerSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class PixxioInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new PixxioModelCollection());

        (new SchedulerSetup(new PixxioApplication()))
            ->addScheduler(new ImportScheduler());

        (new ScriptSetup(new PixxioApplication()))
            ->addScript(new ImportScript())
            ->addScript(new DirectoryImportScript())
            ->addScript(new CleanScript())
            ->addScript(new TestScript());

        (new UsergroupSetup())
            ->addUsergroup(new PixxioUsergroup());


    }
}