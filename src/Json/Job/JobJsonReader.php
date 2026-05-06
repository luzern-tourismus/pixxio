<?php

namespace LuzernTourismus\Pixxio\Json\Job;

use LuzernTourismus\Pixxio\Data\Job\Job;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Json\Reader\JsonReader;
use Nemundo\Core\Type\DateTime\DateTime;

class JobJsonReader extends AbstractBase
{

    use MediaspaceConfigTrait;

    public function getJob($jobId)
    {

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;

        $response = $request->getData('jobs/' . $jobId . '?responseFields=id&responseFields=jobData&responseFields=error&responseFields=jobType&responseFields=success&responseFields=modifyDate&responseFields=progress&responseFields=createDate&responseFields=progress');

        //(new Debug())->write($response);

        $jsonReader = new JsonReader();
        $jsonReader->fromText($response->html);
        $jsonData = $jsonReader->getData();

        $jobData = $jsonData['job'];

        $item = new JobJsonItem();
        $item->id = $jobData['id'];
        $item->jobType = $jobData['jobType'];

        if (isset($jobData['finishedJobData'])) {

            $finishedJobData = $jobData['finishedJobData'];

            $item->fileId = $finishedJobData['fileID'];
            $item->isDuplicate = $finishedJobData['isDuplicate'];

            if (isset($finishedJobData['duplicateInfo'])) {
                $item->existingFileId = $finishedJobData['duplicateInfo']['existingFileID'];
            }

        }

        $item->error = $jobData['error'];
        $item->success = $jobData['success'];
        $item->createDateTime = (new DateTime($jobData['createDate']));
        $item->modifyDateTime = (new DateTime($jobData['modifyDate']));
        $item->percent = $jobData['percent'];

        $data = new Job();
        $data->updateOnDuplicate = true;
        $data->id = $jobId;
        $data->fileId = $item->fileId;
        $data->isDuplicate = $item->isDuplicate;
        $data->createDateTime = $item->createDateTime;
        $data->modifyDateTime = $item->modifyDateTime;
        $data->json = $response->html;
        $data->save();

        return $item;

    }

}