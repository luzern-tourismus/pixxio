<?php

namespace LuzernTourismus\Pixxio\Scheduler;

use LuzernTourismus\Pixxio\Import\PixxioImport;
use Nemundo\App\Scheduler\Job\AbstractScheduler;

class ImportScheduler extends AbstractScheduler
{
    protected function loadScheduler()
    {
    }

    public function run()
    {

        (new PixxioImport())->importData();

    }
}