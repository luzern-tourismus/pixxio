<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Comment\CommentJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Test\AbstractTest;

class CommentJsonReaderTest extends AbstractTest
{

    public function runTest() {

        $reader = new CommentJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $reader->fileId = 905096681;
        foreach ($reader->getData() as $item) {
            (new \Nemundo\Core\Debug\Debug())->write($item);
        }

    }

}