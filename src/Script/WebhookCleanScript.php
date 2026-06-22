<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\Pixxio\Data\Webhook\WebhookDelete;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class WebhookCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-webhook-clean';
    }

    public function run()
    {

        (new WebhookDelete())->delete();

    }
}