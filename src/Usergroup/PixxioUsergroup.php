<?php
namespace LuzernTourismus\Pixxio\Usergroup;
use Nemundo\User\Usergroup\AbstractUsergroup;
class PixxioUsergroup extends AbstractUsergroup {
protected function loadUsergroup() {
$this->usergroup = 'Pixxio';
$this->usergroupId = '6c01da18-321d-4ba1-8285-0c064568e685';
}
}