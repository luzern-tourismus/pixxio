<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Data\CustomMetadata\CustomMetadata;
use LuzernTourismus\Pixxio\Data\CustomMetadataOption\CustomMetadataOption;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Json\CustomMetadata\CustomMetadataJsonReader;
use Nemundo\Core\Base\Import\AbstractImport;

class CustomMetadataImport extends AbstractImport
{

    public function importData()
    {

        $mediaspaceReader = new MediaspaceReader();
        foreach ($mediaspaceReader->getData() as $mediaspaceRow) {

            $reader = new CustomMetadataJsonReader();
            $reader->subdomain = $mediaspaceRow->url;
            $reader->apiKey = $mediaspaceRow->apiKey;

            /*(new AdminTableHeader($table))
                ->addText('Id')
                ->addText('Name')
                ->addText('Type')
                ->addText('Option');*/

            foreach ($reader->getData() as $customMetadataItem) {


                $data = new CustomMetadata();
                $data->updateOnDuplicate = true;
                $data->id = $customMetadataItem->id;
                $data->mediaspaceId = $mediaspaceRow->id;
                $data->name = $customMetadataItem->name;
                $data->save();


                /*$row = new AdminTableRow($table);

                $row
                    ->addText($customMetadataItem->id)
                    ->addText($customMetadataItem->name)
                    ->addText($customMetadataItem->type);

                $ul = new AdminUnorderedList($row);*/

                foreach ($customMetadataItem->getOptionList() as $option) {

                    //$ul->addText($option->id . ' - ' . $option->name);

                    $data = new CustomMetadataOption();
                    $data->updateOnDuplicate = true;
                    $data->id = $option->id;
                    $data->customMetadataId = $customMetadataItem->id;
                    $data->option = $option->name;
                    $data->save();

                }

            }


            //$page = 1;

            /*do {

                $count = 0;

                $direcotryJsonReader = new DirecotryJsonReader();
                $direcotryJsonReader->subdomain = $mediaspaceRow->url;
                $direcotryJsonReader->apiKey = $mediaspaceRow->apiKey;
                $direcotryJsonReader->page = $page;
                foreach ($direcotryJsonReader->getData() as $directoryJsonRow) {

                    $data = new Directory();
                    $data->updateOnDuplicate = true;
                    $data->id = $directoryJsonRow->id;
                    $data->directory = $directoryJsonRow->directory;
                    $data->mediaspaceId = $mediaspaceRow->id;
                    $data->save();

                    $count++;

                }

                $page++;

            } while ($count>0);*/


        }

    }

}