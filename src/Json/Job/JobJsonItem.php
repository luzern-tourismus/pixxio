<?php

namespace LuzernTourismus\Pixxio\Json\Job;

use Nemundo\Core\Base\AbstractBase;

class JobJsonItem extends AbstractBase
{

    public $id;

    public $jobType;

    public $fileId;

    public $isDuplicate = false;

    public $existingFileId;

    public $error;

    public $success;

    public $createDateTime;

    public $modifyDateTime;

    public $percent;

}