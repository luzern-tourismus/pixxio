<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Data\Webhook\Webhook;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Project\Path\TmpPath;
use Nemundo\Web\Site\AbstractSite;

class WebhookRequestSite extends AbstractSite
{

    /**
     * @var PixxioSite
     */
    public static $site;

    protected function loadSite()
    {

        //$this->title = 'Pixxio';
        $this->url = 'pixxio-webhook';

        WebhookRequestSite::$site = $this;

    }

    public function loadContent()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            ob_start();

            $json = file_get_contents('php://input');
            //$object = json_decode($json);


            //try {

                $reader = new JsonReader();
                $reader->fromText($json);
                $jsonData = $reader->getData();

                $eventData = $jsonData['events'];   // $ json_decode(json_encode($eventData), true);

                //(new Debug())->write($eventData);


                /*[events] => Array
                (
                    [0] => Array
                    (
                        [id] => 2098540229
                        [eventKey] => commentCreated
                [action] => created
                [name] => createComment
                [createDate] => 2026-06-22 18:30:19
                        [modifyDate] => 2026-06-22 18:30:19
                        [applicationKe*/


                $data = new Webhook();
                $data->id = $eventData['id'];
                $data->dateTime = new DateTime($eventData['createDate']);
                $data->actionName = $eventData['name'];

                if (isset($eventData['data']['fileID'])) {
                    $data->fileId = $eventData['data']['fileID'];
                }

                $data->save();


                /*   if (json_last_error() !== JSON_ERROR_NONE) {

                   }

                   //$filename = (new TmpPath())->addPath('webhook2.json')->getFullFilename();

                   //file_put_contents($filename, print_r($object, true));*/

                /*$content = ob_get_contents();

                $file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
                $file->overwriteExistingFile = true;
                $file->addLine($json);
                $file->addLine($content);
                $file->writeFile();*/

            } else {

                (new Debug())->write('Wrong Request');

            }


//$response = new PostRequest()


    }
    }