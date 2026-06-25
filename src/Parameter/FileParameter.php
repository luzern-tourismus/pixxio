<?php
namespace LuzernTourismus\Pixxio\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class FileParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'file';
}
}