<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Data\Webhook\Webhook;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Web\Site\AbstractSite;

class WebhookRequestSite extends AbstractSite
{

    /**
     * @var PixxioSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url = 'pixxio-webhook';

        WebhookRequestSite::$site = $this;

    }

    public function loadContent()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //ob_start();

            $json = file_get_contents('php://input');

            $reader = new JsonReader();
            $reader->fromText($json);
            $jsonData = $reader->getData();

            $eventData = $jsonData['events'][0];

            $data = new Webhook();
            $data->id = $eventData['id'];
            $data->dateTime = new DateTime($eventData['createDate']);
            $data->actionName = $eventData['name'];
            if (isset($eventData['data']['fileID'])) {
                $data->fileId = $eventData['data']['fileID'];
            }
            $data->save();


            /*    $content = ob_get_contents();

                $file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
                $file->overwriteExistingFile = true;
                $file->addLine($json);
                $file->addLine($content);
                $file->writeFile();*/

        } else {

            (new Debug())->write('Wrong Request');

        }

    }

}