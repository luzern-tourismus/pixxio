<?php
namespace LuzernTourismus\Pixxio\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use LuzernTourismus\Pixxio\Data\PixxioModelCollection;
use LuzernTourismus\Pixxio\Application\PixxioApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class PixxioUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new PixxioModelCollection());
}
}