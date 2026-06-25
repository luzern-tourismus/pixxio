<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Comment\CommentJsonReader;
use LuzernTourismus\Pixxio\Json\User\UserJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Test\AbstractTest;

class UserJsonReaderTest extends AbstractTest
{

    public function runTest() {

        $reader = new UserJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        foreach ($reader->getData() as $item) {
            (new \Nemundo\Core\Debug\Debug())->write($item);
        }

    }

}