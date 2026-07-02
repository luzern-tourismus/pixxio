<?php

namespace LuzernTourismus\Pixxio\Delete;

use LuzernTourismus\Pixxio\Data\Collection\CollectionDelete;
use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataDelete;
use LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionDelete;
use LuzernTourismus\Pixxio\Data\Directory\DirectoryDelete;
use LuzernTourismus\Pixxio\Data\File\FileDelete;
use LuzernTourismus\Pixxio\Data\User\UserDelete;
use Nemundo\Core\Base\AbstractBase;

class InactiveItemDelete extends AbstractBase
{

    public function deleteInacitveItem()
    {

        $delete = new CollectionDelete();
        $delete->filter->andEqual($delete->model->active, false);
        $delete->delete();

        $delete =new FileDelete();
        $delete->filter->andEqual($delete->model->active, false);
        $delete->delete();

        $delete =new DirectoryDelete();
        $delete->filter->andEqual($delete->model->active, false);
        $delete->delete();

        $delete = new CustomMetadataDelete();
        $delete->filter->andEqual($delete->model->active, false);
        $delete->delete();

        $delete = new CustomMetadataOptionDelete();
        $delete->filter->andEqual($delete->model->active, false);
        $delete->delete();

        $delete = new UserDelete();
        $delete->filter->andEqual($delete->model->active, false);
        $delete->delete();






    }

}