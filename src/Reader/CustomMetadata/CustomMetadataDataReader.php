<?php

namespace LuzernTourismus\Pixxio\Reader\CustomMetadata;

use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataReader;

class CustomMetadataDataReader extends CustomMetadataReader
{

    public function __construct()
    {

        parent::__construct();
        $this->model->loadMediaspace()->loadType();

    }


}