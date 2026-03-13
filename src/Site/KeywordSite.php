<?php
namespace LuzernTourismus\Pixxio\Site;
use Nemundo\Web\Site\AbstractSite;
use LuzernTourismus\Pixxio\Page\KeywordPage;
class KeywordSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Keyword';
$this->url = 'keyword';
}
public function loadContent() {
(new KeywordPage())->render();
}
}