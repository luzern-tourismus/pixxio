<?php

namespace LuzernTourismus\Pixxio\WebRequest;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\AbstractResponse;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Time\Stopwatch;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Core\WebRequest\BearerAuthentication\AbstractBearerAuthenticationWebRequest;
use Nemundo\Core\WebRequest\WebResponse;
use Nemundo\Project\Path\TmpPath;


class PixxioWebRequest extends AbstractBearerAuthenticationWebRequest
{

    use MediaspaceConfigTrait;

    private static $n = 0;


    public function getData($endpoint, $parameter = null)
    {

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);

        if ($parameter !== null) {
            $url .= $parameter;
        }

        $response = $this->getUrl($url);

        if (PixxioConfig::$debugMode) {

            (new Debug())->write($url);

            $filename = (new TmpPath())
                ->addPath('pixxio_' . (new Text($endpoint))->replace('/', '_')->getValue() . '_' . PixxioWebRequest::$n . '.json')
                ->getFullFilename();

            $file = new TextFileWriter($filename);
            $file->overwriteExistingFile = true;
            $file->addLine($response->html);
            $file->writeFile();

            PixxioWebRequest::$n++;

        }

        return $response;

    }


    public function uploadImage($filename, $data)
    {

        $endpoint = 'files';

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);

        $response = $this->uploadFile($url, 'file', $filename, $data);

        return $response;

    }


    public function deleteData($endpoint, $id)
    {

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);
        $url .= '?ids=' . $id;

        $response = $this->deleteUrl($url);
        $this->checkResponse($response);


        //{"success":false,"errorGroup":"unknown","errorcode":5016,"errormessage":"The user is not allowed to delete the file, because the user is not allowed to delete its own files."}

        //(new Debug())->write($response);

    }





    public function postData($endpoint, $json)
    {

        //(new Debug())->write($json);
        $this->bearerAuthentication = $this->apiKey;

        $data = $this->postUrl($this->getServiceUrl($endpoint), $json);
        return $data;

    }


    public function putData($endpoint, $json)
    {

        //(new Debug())->write($json);
        $this->bearerAuthentication = $this->apiKey;

        //(new Debug())->write($this->bearerAuthentication);

        $data = $this->putUrl($this->getServiceUrl($endpoint), $json);
        return $data;

    }


    private function getServiceUrl($endpoint)
    {

        //$version = 'v1';
        $version = 'unstable';

        $url = 'https://' . $this->subdomain . '.px.media/api/' . $version . '/' . $endpoint;

        return $url;

    }


    private function checkResponse(WebResponse $response)
    {

        //{"success":false,"errorGroup":"unknown","errorcode":5016,"errormessage":"The user is not allowed to delete the file, because the user is not allowed to delete its own files."}

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);

        $jsonData = $jsonReader->getData();

        //if (isset($jsonData['success'])) {
            if (!$jsonData['success']) {
                (new Debug())->write($jsonData);
            //$success = $jsonData['success'];
        } /*else {
            (new Debug())->write($jsonData);
        }*/



    }




}