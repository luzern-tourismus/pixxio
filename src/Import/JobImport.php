<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\Job\Job;
use LuzernTourismus\Pixxio\Data\Job\JobReader;
use LuzernTourismus\Pixxio\Data\Job\JobUpdate;
use LuzernTourismus\Pixxio\Json\Job\JobJsonReader;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\PixxioTest\MediaspaceConfigTest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;

class JobImport extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function updateJob()
    {

        $reader = new JobReader();
        $reader->filter->andEqual($reader->model->success, false);
        //$reader->filter->andEqual($reader->model->jobExists, true);

        foreach ($reader->getData() as $jobRow) {

            $this->importJob($jobRow->id);

            /*$reader = new JobJsonReader();
            $reader->subdomain = $this->subdomain;
            $reader->apiKey = $this->apiKey;
            $item = $reader->getJob($jobRow->id);

            if (!$item->jobExists) {
                $update = new JobUpdate();
                $update->jobExists = false;
                $update->updateById($jobRow->id);
                //(new JobDelete())->deleteById($jobRow->id);
            }*/


        }

    }


    public function importJob($jobId)
    {

        $reader = new JobJsonReader();
        $reader->fromMediaspaceConfig(new MediaspaceConfigTest());
        $item = $reader->getJob($jobId);

        //(new Debug())->write($item);

        if ($item->jobExists) {

            $data = new Job();
            $data->updateOnDuplicate = true;
            $data->id = $jobId;
            //$data->jobExists = true;
            $data->fileId = $item->fileId;
            $data->isDuplicate = $item->isDuplicate;
            $data->createDateTime = $item->createDateTime;
            $data->modifyDateTime = $item->modifyDateTime;
            $data->json = $item->json;  // $response->html;
            $data->success = $item->success;
            $data->save();

        }


    }


}