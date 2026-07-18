<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Job\Job;
use LuzernTourismus\Pixxio\Data\Job\JobReader;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Base\AbstractBase;

class JobImport extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function updateJob()
    {

        $reader = new JobReader();
        $reader->filter->andEqual($reader->model->success, false);
        foreach ($reader->getData() as $jobRow) {
            $this->importJob($jobRow->id);
        }

    }


    public function importJob($jobId)
    {

        $reader = new JobJsonReader();
        $reader->subdomain = $this->subdomain;
        $reader->apiKey = $this->apiKey;
        $item = $reader->getJob($jobId);

        if ($item->jobExists) {

            $data = new Job();
            $data->updateOnDuplicate = true;
            $data->id = $jobId;
            $data->fileId = $item->fileId;
            $data->isDuplicate = $item->isDuplicate;
            $data->createDateTime = $item->createDateTime;
            $data->modifyDateTime = $item->modifyDateTime;
            $data->json = $item->json;
            $data->success = $item->success;
            $data->save();

        }

    }

}