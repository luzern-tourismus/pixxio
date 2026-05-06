<?php

namespace LuzernTourismus\PixxioTest;

use LuzernTourismus\Pixxio\Data\Job\Job;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Random\RandomText;
use Nemundo\Core\System\Delay;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Project\Path\TmpPath;

class TextFileUploadTest extends AbstractTest
{

    public function runTest()
    {

        $filename = (new TmpPath())
            ->addPath('file1.txt')
            ->getFullFilename();

        $file = new TextFileWriter($filename);
        $file->overwriteExistingFile = true;
        $file->addLine((new RandomText())->getText());
        $file->writeFile();

        $directoryId = $this->getValue('test_directory_id');

        $upload = new \LuzernTourismus\Pixxio\Json\FileUpload();
        $upload->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $upload->fullFilename = $filename;
        $upload->title = 'Test';
        //$upload->directoryId = $directoryId;
        $upload->addKeyword('');
//        $upload->addMetadata(628208860, 'Copyright by xy');
        $upload->addMetadata(628208, 'Copyright by xy');
        $upload->addMetadata(1968059366, 2689);

//$upload->addMetadata(1968059366, 26897557);
        $upload->description = '';
        $jobId = $upload->upload();

        $this->checkJob($jobId);
        (new Delay())->delay(5);
        $this->checkJob($jobId);

    }


    private function checkJob($jobId)
    {

        (new \Nemundo\Core\Debug\Debug())->write($jobId);

        $reader = new \LuzernTourismus\Pixxio\Json\Job\JobJsonReader();
        $reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        $item = $reader->getJob($jobId);









        (new Debug())->write($item);

    }


}