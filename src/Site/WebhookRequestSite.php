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

      //      ob_start();

            $json = file_get_contents('php://input');
            $object = json_decode($json);


       /*     $reader = new JsonReader();
            $reader->fromText($json);
            $jsonData = $reader->getData();


            $data = new Webhook();
            $data->id = $jsonData['id'];
            $data->dateTime = new DateTime($jsonData['createDate']);
            $data->actionName = $jsonData['name'];

            if (isset($data['data']['fileID'])) {
                $data->fileId = $data['data']['fileID'];
            }

            $data->save();


            /*
                        [id] => 2019240742
                                [eventKey] => commentCreated
                        [action] => created
                        [name] => createComment
                        [createDate] => 2026-06-22 17:36:40
                                [modifyDate] => 2026-06-22 17:36:40
                                [applicationKey] => iM91iRu6kb86Y6IaWMsK9T9q7
                        [applicationName] => pixx.io
                        [userType] => user
                        [userID] => 1
                                [userName] => admin
                        [userDescriptiveName] => System Administrator
                        [resourceType] => comment
                        [resourceID] => 1920544565
                                [resourceName] => Comment
                        [resourceOwnerUserType] => user
                        [resourceOwnerUserID] => 0
                                [resourceOwnerUserName] => admin
                        [data] => stdClass Object
                        (
                            [fileID] => 1166093766
                                    )*/


         /*   if (json_last_error() !== JSON_ERROR_NONE) {

            }

            //$filename = (new TmpPath())->addPath('webhook2.json')->getFullFilename();

            //file_put_contents($filename, print_r($object, true));

            $content = ob_get_contents();*/

            $file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
            $file->overwriteExistingFile = true;
            $file->addLine($json);
            $file->writeFile();

        } else {

            (new Debug())->write('Wrong Request');

        }


//$response = new PostRequest()


    }
}