<?php

namespace LuzernTourismus\Pixxio\Reader\File;

use LuzernTourismus\Pixxio\Data\File\FilePaginationReader;
use LuzernTourismus\Pixxio\Data\File\FileReader;

class FileDataPaginationReader extends FilePaginationReader
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