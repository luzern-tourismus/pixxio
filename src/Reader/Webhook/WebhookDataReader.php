<?php

namespace LuzernTourismus\Pixxio\Reader\Webhook;

use LuzernTourismus\Pixxio\Data\Webhook\WebhookReader;

class WebhookDataReader extends WebhookReader
{

    public function __construct()
    {

        parent::__construct();
        $this->model->loadFile();

    }

}