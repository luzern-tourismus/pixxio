<?php

namespace LuzernTourismus\Pixxio\Site\Mediaspace;

use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceDelete;
use LuzernTourismus\Pixxio\Page\Mediaspace\MediaspaceNewPage;
use LuzernTourismus\Pixxio\Parameter\MediaspaceParameter;
use Nemundo\Admin\Site\AbstractDeleteIconSite;
use Nemundo\Admin\Site\AbstractNewIconSite;
use Nemundo\Core\Http\Url\UrlReferer;

class MediaspaceDeleteSite extends AbstractDeleteIconSite
{

    /**
     * @var MediaspaceNewSite
     */
    public static $site;

    protected function loadSite()
    {
        /*$this->title = 'MediaspaceNew';
        $this->url = 'MediaspaceNew';
        $this->menuActive = false;*/

        MediaspaceDeleteSite::$site = $this;

    }

    public function loadContent()
    {

        $mediaspaceId = (new MediaspaceParameter())->getValue();
        (new MediaspaceDelete())->deleteById($mediaspaceId);

        (new UrlReferer())->redirect();


    }
}