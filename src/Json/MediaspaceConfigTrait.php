<?php

namespace LuzernTourismus\Pixxio\Json;

use LuzernTourismus\Pixxio\Mediaspace\AbstractMediaspaceConfig;

trait MediaspaceConfigTrait
{

    public $subdomain;


    public $apiKey;

    public function fromMediaspaceConfig(AbstractMediaspaceConfig $config)
    {
        $this->subdomain = $config->subdomain;
        $this->apiKey = $config->apiKey;

        return $this;

    }


}