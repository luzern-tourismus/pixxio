<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceId;
use LuzernTourismus\Pixxio\Data\Webhook\Webhook;
use LuzernTourismus\Pixxio\Import\CommentImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Json\File\FileJson;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
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

        $this->url = 'pixxio-webhook';

        WebhookRequestSite::$site = $this;

    }

    public function loadContent()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            ob_start();

            $json = file_get_contents('php://input');

            $reader = new JsonReader();
            $reader->fromText($json);
            $jsonData = $reader->getData();

            $eventData = $jsonData['events'][0];


            $fileId = null;
            if (isset($eventData['data']['fileID'])) {
                $fileId = $eventData['data']['fileID'];
             //   $data->fileId = $eventData['data']['fileID'];
            }

            $data = new Webhook();
            $data->id = $eventData['id'];
            $data->dateTime = new DateTime($eventData['createDate']);
            $data->actionName = $eventData['name'];

            //if (isset($eventData['data']['fileID'])) {
              //  $fileId = $eventData['data']['fileID'];
                $data->fileId =$fileId;  // $eventData['data']['fileID'];
            //}


            $data->save();


            $id = new MediaspaceId();
            $id->filter->andEqual($id->model->url, 'luzern-tourismus' );
            $mediaspaceId = $id->getId();


            (new Debug())->write($mediaspaceId);

            $mediaspaceRow = (new \LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader())->getRowById($mediaspaceId);

            //(new Debug())->write($mediaspaceRow);


            $file = new FileJson();
            //$file->fromMediaspaceConfig(new MediaspaceConfigTest());
            $file->subdomain= $mediaspaceRow->url;
            $file->apiKey = $mediaspaceRow->apiKey;
            $fileItem = $file->getFile($fileId);

            $import = new FileImport();
            $import->importFile($fileItem, $mediaspaceId);


            (new CommentImport())->importComment($fileId);



/*
            (
            [id] => 1283736455
    [eventKey] => commentCreated
            [action] => created
            [name] => createComment
            [createDate] => 2026-06-22 18:55:54
    [modifyDate] => 2026-06-22 18:55:54
    [applicationKey] => iM91iRu6kb86Y6IaWMsK9T9q7
            [applicationName] => pixx.io
            [userType] => user
            [userID] => 1
    [userName] => admin
            [userDescriptiveName] => System Administrator
            [resourceType] => comment
            [resourceID] => 1412627172
    [resourceName] => Comment
            [resourceOwnerUserType] => user
            [resourceOwnerUserID] => 0
    [resourceOwnerUserName] => admin
            [data] => Array
            (
                [fileID] => 354052574
            )

)*/






                $content = ob_get_contents();

                $file = new TextFileWriter((new TmpPath())->addPath('webhook.txt')->getFullFilename());
                $file->overwriteExistingFile = true;
                $file->addLine($json);
                $file->addLine($content);
                $file->writeFile();

        } else {

            (new Debug())->write('Wrong Request');

        }

    }

}