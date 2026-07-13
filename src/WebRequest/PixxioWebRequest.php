<?php

namespace LuzernTourismus\Pixxio\WebRequest;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Response\StatusCode;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
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
        $this->checkResponse($response);

        if (PixxioConfig::$debugMode) {

            (new Debug())->write($url);


            $filename = (new TmpPath())
                ->addPath('pixxio_' . (new Text($endpoint))
                        ->replace('&', '_')
                        ->replace('=', '_')
                        ->replace('?', '_')
                        ->replace('/', '_')->getValue() . '_' . PixxioWebRequest::$n . '.json')
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
        $this->checkResponse($response);

        /*(new Debug())->write($url);
        (new Debug())->write($response);*/

        return $response;

    }


    public function deleteParameter($endpoint, $parameter = [])
    {

        $this->bearerAuthentication = $this->apiKey;

        $urlBuilder = new UrlBuilder($this->getServiceUrl($endpoint));
        foreach ($parameter as $key => $value) {
            $urlBuilder->addRequestValue($key, $value);
        }

        $url = $urlBuilder->getUrl();

        $response = $this->deleteUrl($url);

        //(new Debug())->write($response);

        $this->checkResponse($response);

    }


    public function deleteId($endpoint, $id)
    {

        $this->bearerAuthentication = $this->apiKey;
        $url = $this->getServiceUrl($endpoint);
        $url .= '?ids=' . $id;

        if (PixxioConfig::$debugMode) {
            (new Debug())->write($url);
        }

        $response = $this->deleteUrl($url);
        $this->checkResponse($response);

    }


    public function postData($endpoint, $json)
    {

        $this->bearerAuthentication = $this->apiKey;

        $response = $this->postUrl($this->getServiceUrl($endpoint), $json);
        $this->checkResponse($response);

        return $response;

    }


    public function putData($endpoint, $json)
    {

        $this->bearerAuthentication = $this->apiKey;

        $data = $this->putUrl($this->getServiceUrl($endpoint), $json);
        $this->checkResponse($data);

        //return $data;

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

        if ($response->statusCode === StatusCode::NOT_FOUND) {
            //(new Debug())->write('Pixxio Error: Not found');
            (new Debug())->write($response);
        }

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);

        $jsonData = $jsonReader->getData();

        if (isset($jsonData['success'])) {
            if (!$jsonData['success']) {
                (new Debug())->write('Pixxio Error: ' . $jsonData['errormessage']);
            }
        } else {
            (new Debug())->write($jsonData);
        }

    }

}