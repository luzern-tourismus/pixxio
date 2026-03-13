<?php

namespace LuzernTourismus\Pixxio\Com\Tab;

use LuzernTourismus\Pixxio\Site\PixxioSite;
use Nemundo\Admin\Com\Tab\AdminTab;

class PixxioTab extends AdminTab
{

    public function getContent()
    {

        $this->site= PixxioSite::$site;
        return parent::getContent();

    }

}