<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Job\JobReader;
use LuzernTourismus\Pixxio\Data\Job\JobUpdate;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class JobImport extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function updateJob()
    {

        $reader = new JobReader();
        $reader->filter->andEqual($reader->model->success, false);
        $reader->filter->andEqual($reader->model->jobExists, true);

        foreach ($reader->getData() as $jobRow) {

            //(new Debug())->write($jobRow->id);

            $reader = new JobJsonReader();
            $reader->subdomain = $this->subdomain;
            $reader->apiKey = $this->apiKey;
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