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
            $object = json_decode($json);


            $reader = new JsonReader();
            $reader->fromText($json);
            $jsonData = $reader->getData();

            (new Debug())->write($jsonData);


          /*  $data = new Webhook();
            $data->id = $jsonData['id'];
            $data->dateTime = new DateTime($jsonData['createDate']);
            $data->actionName = $jsonData['name'];

            if (isset($data['data']['fileID'])) {
                $data->fileId = $data['data']['fileID'];
            }

            $data->save();*/






         /*   if (json_last_error() !== JSON_ERROR_NONE) {

            }

            //$filename = (new TmpPath())->addPath('webhook2.json')->getFullFilename();

            //file_put_contents($filename, print_r($object, true));*/

            $content = ob_get_contents();

            $file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
            $file->overwriteExistingFile = true;
            $file->addLine($json);
            $file->addLine($content);
            $file->writeFile();

        } else {

            (new Debug())->write('Wrong Request');

        }


//$response = new PostRequest()


    }
}