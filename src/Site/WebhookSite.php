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





        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // fetch RAW input
            $json = file_get_contents('php://input');

            // decode json
            $object = json_decode($json);

            // expecting valid json
            if (json_last_error() !== JSON_ERROR_NONE) {
                //die(header('HTTP/1.0 415 Unsupported Media Type'));
            }

            /**
             * Do something with object, structure will be like:
             * $object->accountId
             * $object->details->items[0]['contactName']
             */
            // dump to file so you can see

            $filename = (new TmpPath())->addPath('webhook2.json')->getFullFilename();

            file_put_contents($filename, print_r($object, true));

            /*$file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
            $file->overwriteExistingFile = true;
            $file->addLine($string = implode(", ", $_POST));
            $file->writeFile();*/

        }



//$response = new PostRequest()







    }
}