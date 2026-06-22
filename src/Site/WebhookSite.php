<?php
namespace LuzernTourismus\Pixxio\Site;
use Nemundo\Web\Site\AbstractSite;
use LuzernTourismus\Pixxio\Page\WebhookPage;
class WebhookSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Webhook';
$this->url = 'Webhook';
}
public function loadContent() {
(new WebhookPage())->render();
}
}