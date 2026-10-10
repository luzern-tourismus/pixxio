<?php

namespace LuzernTourismus\Pixxio\Site;

use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceId;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Data\Webhook\Webhook;
use LuzernTourismus\Pixxio\Import\CommentImport;
use LuzernTourismus\Pixxio\Import\FileImport;
use LuzernTourismus\Pixxio\Json\File\FileJson;
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
            }

            $data = new Webhook();
            $data->id = $eventData['id'];
            $data->dateTime = new DateTime($eventData['createDate']);
            $data->actionName = $eventData['name'];
            $data->fileId = $fileId;
            $data->save();

            $id = new MediaspaceId();
            $id->filter->andEqual($id->model->url, 'luzern-tourismus');
            $mediaspaceId = $id->getId();

            $mediaspaceRow = (new MediaspaceReader())->getRowById($mediaspaceId);

            $file = new FileJson();
            $file->subdomain = $mediaspaceRow->url;
            $file->apiKey = $mediaspaceRow->apiKey;
            $fileItem = $file->getFile($fileId);

            $import = new FileImport();
            $import->importFile($fileItem, $mediaspaceId);

            $import = new CommentImport();
            $import->subdomain = $mediaspaceRow->url;
            $import->apiKey = $mediaspaceRow->apiKey;
            $import->importComment($fileId);

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