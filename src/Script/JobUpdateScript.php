<?php

namespace LuzernTourismus\Pixxio\Script;

use LuzernTourismus\DamMigration\Mediaspace\LuzernMediaspaceConfig;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Import\JobImport;
use Nemundo\App\Script\Type\AbstractConsoleScript;

class JobUpdateScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'pixxio-job-update';
    }

    public function run()
    {


        $reader = new MediaspaceReader();
        foreach ($reader->getData() as $mediaspaceRow) {

            $import = new JobImport();
            $import->subdomain = $mediaspaceRow->mediaspace;
            $import->apiKey = $mediaspaceRow->apiKey;
            $import->updateJob();

        }


        /*$reader = new JobReader();
        $reader->filter->andEqual($reader->model->success, false);
        $reader->filter->andEqual($reader->model->jobExists,true);

        foreach ($reader->getData() as $jobRow) {

            (new Debug())->write($jobRow->id);

            $reader = new JobJsonReader();
            $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
            $item = $reader->getJob($jobRow->id);

            //(new Debug())->write($item);

            if (!$item->jobExists) {
                $update = new JobUpdate();
                $update->jobExists = false;
                $update->updateById($jobRow->id);
                //(new JobDelete())->deleteById($jobRow->id);
            }


        }*/

    }
}