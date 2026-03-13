<?php

namespace LuzernTourismus\Pixxio\Reader\File;

use LuzernTourismus\Pixxio\Data\File\FileReader;

class FileDataReader extends FileReader
{

    use MediaspaceFilterTrait;

    public function __construct()
    {

        parent::__construct();
        $this->loadModel();
        //$this->model->loadMediaspace();

    }


    public function getData()
    {

        return parent::getData();

    }



}