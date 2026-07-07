<?php
namespace LuzernTourismus\Pixxio\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class CollectionParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'collection';
}
}