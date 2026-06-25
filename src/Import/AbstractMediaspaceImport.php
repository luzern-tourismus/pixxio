<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use LuzernTourismus\Pixxio\Data\File\File;
use LuzernTourismus\Pixxio\Data\FileKeyword\FileKeyword;
use LuzernTourismus\Pixxio\Data\Keyword\Keyword;
use LuzernTourismus\Pixxio\Data\Keyword\KeywordId;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow;
use LuzernTourismus\Pixxio\Json\File\FileJsonItem;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;
use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;
use Nemundo\Core\Base\Import\AbstractImport;
use Nemundo\Core\Check\ValueCheck;
use Nemundo\Core\Debug\Debug;

abstract class AbstractMediaspaceImport extends AbstractImport
{

    private $mediaspaceReader;


    abstract protected function beforeImport();


    abstract protected function afterImport();


    protected abstract function onMediaspace(MediaspaceRow $mediaspaceRow);


    public function __construct()
    {

        $this->mediaspaceReader = new MediaspaceReader();

    }


    public function filterByMediaspaceConfig(AbstractMediaspaceConfig $mediaspace)
    {

        $this->mediaspaceReader->filter->andEqual($this->mediaspaceReader->model->apiKey, $mediaspace->apiKey);
        return $this;

    }


    public function filterByMediaspaceId($mediaspaceId)
    {

        if ((new ValueCheck())->hasValue($mediaspaceId)) {
            $this->mediaspaceReader->filter->andEqual($this->mediaspaceReader->model->id, $mediaspaceId);
        }

        return $this;

    }





    public function importData()
    {

        $this->beforeImport();

        foreach ($this->mediaspaceReader->getData() as $mediaspaceRow) {
            $this->onMediaspace($mediaspaceRow);
        }

        $this->afterImport();

    }

}