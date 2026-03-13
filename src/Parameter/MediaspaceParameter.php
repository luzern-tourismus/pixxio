<?php
namespace LuzernTourismus\Pixxio\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class MediaspaceParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'mediaspace';
}
}