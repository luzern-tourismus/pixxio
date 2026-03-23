<?php

namespace LuzernTourismus\Pixxio\WebRequest;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Path\Path;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Core\WebRequest\BearerAuthentication\AbstractBearerAuthenticationWebRequest;
use Nemundo\Project\Path\TmpPath;


class PixxioWebRequest extends AbstractBearerAuthenticationWebRequest
{

    public $mediaSpace;


    public $apiKey;

    private static $n = 0;


    public function getData($endpoint, $parameter)
    {

        $this->bearerAuthentication = $this->apiKey;
        $url = 'https://' . $this->mediaSpace . '.px.media/api/v1/' . $endpoint;

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


    public function uploadFile($filename, $data = [])
    {

        try {
            $data['file'] = new \CURLFile($filename, mime_content_type($filename), basename($filename));
        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }

        $endpoint = 'files';

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);

        $response = $this->postUrl($url, $data);

        return $response;


    }


    //public function deleteAsset($id)
    public function deleteData($endpoint, $id)
    {

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);
        $url .= '?ids=' . $id;


        $response = $this->deleteUrl($url);

        //(new Debug())->write($response);

    }


    private function getServiceUrl($endpoint)
    {

        //$this->bearerAuthentication = PixxioConfig::$apiKey;
        //$url = 'https://' . PixxioConfig::$mediaSpace . '.px.media/api/v1/' . $endpoint;  //.$parameter;
        $url = 'https://' . $this->mediaSpace . '.px.media/api/v1/' . $endpoint;  //.$parameter;

        return $url;

    }


    public function postData($endpoint, $json)
    {

        (new Debug())->write($json);

        $data = $this->postUrl($this->getServiceUrl($endpoint), $json);
        return $data;

    }


}