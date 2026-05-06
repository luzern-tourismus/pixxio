<?php

namespace LuzernTourismus\Pixxio\Json\Download;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class AssetDownload extends AbstractBase
{


    use MediaspaceConfigTrait;

    public function getDownloadUrl($id)
    {

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;


        $endpoint = 'files';
        $endpoint.= '/'.$id.'/convert?downloadType=custom&fileExtension=jpg&rotation=180&width=400';

        //https://[EXAMPLE-MEDIASPACE].px.media/api/unstable/files/{id}/convert

        $response = $request->getData($endpoint);

        (new Debug())->write($response);

    }


}