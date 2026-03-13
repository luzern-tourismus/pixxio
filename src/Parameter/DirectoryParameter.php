<?php
namespace LuzernTourismus\Pixxio\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class DirectoryParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'directory';
}
}