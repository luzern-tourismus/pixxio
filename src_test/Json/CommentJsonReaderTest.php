<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Comment\CommentJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Test\AbstractTest;

class CommentJsonReaderTest extends AbstractTest
{

    public function runTest()
    {

        $id = 1976817110;

        $reader = new CommentJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $reader->fileId = $id;
        foreach ($reader->getData() as $item) {
            (new \Nemundo\Core\Debug\Debug())->write($item);
        }

    }

}