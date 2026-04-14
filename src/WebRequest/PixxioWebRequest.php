<?php

namespace LuzernTourismus\Pixxio\WebRequest;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\Type\Text\Text;
use Nemundo\Core\WebRequest\BearerAuthentication\AbstractBearerAuthenticationWebRequest;
use Nemundo\Project\Path\TmpPath;


class PixxioWebRequest extends AbstractBearerAuthenticationWebRequest
{

    use MediaspaceConfigTrait;

    //public $subdomain;


    //public $apiKey;

    private static $n = 0;


    public function getData($endpoint, $parameter)
    {

        //$version = 'v1';
        //$version='unstable';

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);  // 'https://' . $this->subdomain . '.px.media/api/'.$version.'/' . $endpoint;

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


    public function uploadImage($filename, $data)   //, $data = [])
    {

        /*try {
            $data['file'] = new \CURLFile($filename, mime_content_type($filename), basename($filename));
        } catch (\Exception $exception) {
            (new Debug())->write($exception->getMessage());
        }*/

        $endpoint = 'files';

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);

        $response = $this->uploadFile($url, 'file', $filename, $data);  //  ->postUrl($url, $data);


        /*$jobId = null;
        if ($response->statusCode === StatusCode::OK) {

            $json = (new JsonReader())->fromText($response->html)->getData();
            $jobId = $json['jobID'];

        } else {

            (new Debug())->write($response);

        }


        /*
                [statusCode] => 200
            [html] => {"success":true,"jobID":22865113}*/


        //return $jobId;  // $response;

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

        //$version = 'v1';
        $version = 'unstable';
        $url = 'https://' . $this->subdomain . '.px.media/api/' . $version . '/' . $endpoint;

        return $url;

    }


    public function postData($endpoint, $json)
    {

        (new Debug())->write($json);
        $this->bearerAuthentication = $this->apiKey;

        $data = $this->postUrl($this->getServiceUrl($endpoint), $json);
        return $data;

    }


    public function putData($endpoint, $json)
    {

        (new Debug())->write($json);
        $this->bearerAuthentication = $this->apiKey;

        (new Debug())->write($this->bearerAuthentication);

        $data = $this->putUrl($this->getServiceUrl($endpoint), $json);
        return $data;

    }


}