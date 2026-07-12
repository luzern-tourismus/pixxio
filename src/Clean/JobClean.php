<?php

namespace LuzernTourismus\Pixxio\Clean;

use LuzernTourismus\Pixxio\Data\Job\JobDelete;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Project\Install\AbstractClean;

class JobClean extends AbstractBase
{

    public function clean()
    {

        (new JobDelete())->delete();
        return $this;

    }

}