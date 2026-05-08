<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\DamMigration\Mediaspace\LuzernMediaspaceConfig;
use LuzernTourismus\Pixxio\Data\Job\JobDelete;
use LuzernTourismus\Pixxio\Data\Job\JobReader;
use LuzernTourismus\Pixxio\Data\Job\JobUpdate;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;

class JobUpdateScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-job-update';
    }

    public function run()
    {

        //$reader = new MigrationLogReader();
        $reader = new JobReader();
        $reader->filter->andEqual($reader->model->success, false);
        $reader->filter->andEqual($reader->model->jobExists,true);
        //$reader->filter->andEqual($reader->model->success celumId);
        foreach ($reader->getData() as $jobRow) {

            $reader = new JobJsonReader();
            $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
            //$reader->fromMediaspaceConfig(new LuzernMediaspaceConfig());
            $item = $reader->getJob($jobRow->id);

            //(new Debug())->write($item);

            if (!$item->jobExists) {
                $update = new JobUpdate();
                $update->jobExists = false;
                $update->updateById($jobRow->id);
                //(new JobDelete())->deleteById($jobRow->id);
            }


        }

    }
}