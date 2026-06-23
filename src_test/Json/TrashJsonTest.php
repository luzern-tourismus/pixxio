<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Trash\TrashJson;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Test\AbstractTest;

class TrashJsonTest extends AbstractTest
{

    public function runTest() {

        $trash = new TrashJson();
        $trash->fromMediaspaceConfig(new MediaspaceConfigTest());
        $trash->deleteAll();

    }

}