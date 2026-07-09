<?php

namespace LuzernTourismus\Pixxio\Json\File;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Json\Reader\JsonReader;

class FileJson extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function getFile($fileId)
    {

        $endpoint = 'files';

        $url = new UrlBuilder('');
        $url->addRequestValue('responseFields', FileConfig::$responseField);

        $parameter = '/' . $fileId . $url->getUrl();
        $loopName = 'file';

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;

        $response = $request->getData($endpoint, $parameter);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        $json = $jsonData[$loopName];

        $item = new FileJsonItem($json);

        return $item;

    }

}