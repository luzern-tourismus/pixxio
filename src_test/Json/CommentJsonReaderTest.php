<?php

namespace LuzernTourismus\PixxioTest\Json;

use LuzernTourismus\Pixxio\Json\Comment\CommentJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Test\AbstractTest;

class CommentJsonReaderTest extends AbstractPixxioTest
{

    public function runTest()
    {

        $reader = new CommentJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $reader->fileId = $this->getFileId();
        foreach ($reader->getData() as $item) {
            (new \Nemundo\Core\Debug\Debug())->write($item);
        }

    }

}