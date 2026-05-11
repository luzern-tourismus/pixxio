<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadata;
use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadataUpdate;
use LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOption;
use LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOptionUpdate;
use LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataType;
use LuzernTourismus\Pixxio\Data\CustomMetadataType\CustomMetadataTypeId;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader;
use Nemundo\Core\Base\Import\AbstractImport;

class CustomMetadataImport extends AbstractImport
{

    public function importData()
    {

        $update = new CustomMetadataUpdate();
        $update->importStatus = false;
        $update->update();

        $update = new CustomMetadataOptionUpdate();
        $update->importStatus = false;
        $update->update();

        $mediaspaceReader = new MediaspaceReader();
        foreach ($mediaspaceReader->getData() as $mediaspaceRow) {

            $reader = new CustomMetadataJsonReader();
            $reader->subdomain = $mediaspaceRow->url;
            $reader->apiKey = $mediaspaceRow->apiKey;

            foreach ($reader->getData() as $customMetadataItem) {

                $data = new CustomMetadataType();
                $data->ignoreIfExists = true;
                $data->type = $customMetadataItem->type;
                $data->save();

                $id = new CustomMetadataTypeId();
                $id->filter->andEqual($id->model->type, $customMetadataItem->type);
                $typeId = $id->getId();

                $data = new CustomMetadata();
                $data->updateOnDuplicate = true;
                $data->id = $customMetadataItem->id;
                $data->importStatus = true;
                $data->active = true;
                $data->mediaspaceId = $mediaspaceRow->id;
                $data->name = $customMetadataItem->name;
                $data->typeId = $typeId;
                $data->save();

                foreach ($customMetadataItem->getOptionList() as $option) {

                    $data = new CustomMetadataOption();
                    $data->updateOnDuplicate = true;
                    $data->id = $option->id;
                    $data->importStatus = true;
                    $data->active = true;
                    $data->customMetadataId = $customMetadataItem->id;
                    $data->option = $option->name;
                    $data->save();

                }

            }

        }

        $update = new CustomMetadataUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

        $update = new CustomMetadataOptionUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

    }

}