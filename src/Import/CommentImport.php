<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Comment\Comment;
use LuzernTourismus\Pixxio\Json\Comment\CommentJsonReader;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Base\Import\AbstractImport;

class CommentImport extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function importComment($fileId)
    {

        $reader = new CommentJsonReader();
        $reader->subdomain = $this->subdomain;
        $reader->apiKey = $this->apiKey;
        //$reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $reader->fileId = $fileId;
        foreach ($reader->getData() as $item) {
            //(new \Nemundo\Core\Debug\Debug())->write($item);

            $data = new Comment();
            $data->updateOnDuplicate=true;
            $data->id = $item->id;
            $data->fileId = $fileId;
            $data->userId= $item->userId;
            $data->comment = $item->comment;
            $data->dateTime = $item->dateTime;
            $data->save();

        }


    }

}