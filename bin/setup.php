<?php

use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\User\Script\AdminUserScript;

require "config.php";

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();

$reset = new ProjectReset();

(new ProjectInstall())->install();
(new ScriptSetup())->addScript(new AdminUserScript());

(new \LuzernTourismus\Pixxio\Application\PixxioApplication())->installApp();

$reset->remove();
