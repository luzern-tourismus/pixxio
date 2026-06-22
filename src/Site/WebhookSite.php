<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Page\PixxioPage;
use LuzernTourismus\Pixxio\Usergroup\PixxioUsergroup;
use Nemundo\Core\Http\Request\Post\PostRequest;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;

class WebhookSite extends AbstractSite
{

    /**
     * @var PixxioSite
     */
    public static $site;

    protected function loadSite()
    {

        //$this->title = 'Pixxio';
        $this->url = 'pixxio-webhook';

        WebHookSite::$site = $this;

    }

    public function loadContent()
    {


        $file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
        $file->overwriteExistingFile = true;
        $file->addLine($string = implode(", ", $_POST));
        $file->writeFile();



//$response = new PostRequest()







    }
}