<?php

namespace LuzernTourismus\Pixxio;

use Nemundo\Core\Path\Path;
use Nemundo\Project\AbstractProject;

class PixxioProject extends AbstractProject
{
    public function loadProject()
    {
        $this->project = 'Pixxio';
        $this->projectName = 'pixxio';
        $this->path = __DIR__;
        $this->namespace = __NAMESPACE__;
        $this->modelPath = (new Path())
            ->addPath(__DIR__)
            ->addParentPath()
            ->addPath('model')
            ->getPath();
    }
}