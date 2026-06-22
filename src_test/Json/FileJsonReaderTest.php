<?php

namespace LuzernTourismus\PixxioTest\Json;

use Nemundo\Test\AbstractTest;

class FileJsonReaderTest extends AbstractTest
{

    public function runTest() {

        /*$subdomain = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
        $api = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');*/

        $reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
        $reader->fromMediaspaceConfig(new \LuzernTourismus\PixxioTest\MediaspaceConfigTest());
        //$reader->
        /*$reader->subdomain = $subdomain;
        $reader->apiKey = $api;*/
        //$reader->pageSize = 1;
        $reader->pageSize = 100;

        foreach ($reader->getData() as $file) {
            (new \Nemundo\Core\Debug\Debug())->write($file);
        }




    }

}