<?php

namespace LuzernTourismus\Pixxio\Json\Collection;

use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;

class CollectionJsonDelete extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function deleteCollection($id)
    {

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $request->deleteId('collections', $id);

    }

}