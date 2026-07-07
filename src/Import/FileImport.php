<?php

namespace LuzernTourismus\Pixxio\Import;

use LuzernTourismus\Pixxio\Config\EditTypeConfig;
use LuzernTourismus\Pixxio\Data\File\File;
use LuzernTourismus\Pixxio\Data\File\FileUpdate;
use LuzernTourismus\Pixxio\Data\FileKeyword\FileKeyword;
use LuzernTourismus\Pixxio\Data\FileMetadata\FileMetadata;
use LuzernTourismus\Pixxio\Data\FileMetadata\FileMetadataUpdate;
use LuzernTourismus\Pixxio\Data\Keyword\Keyword;
use LuzernTourismus\Pixxio\Data\Keyword\KeywordId;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceRow;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValue;
use LuzernTourismus\Pixxio\Data\MetadataOptionValue\MetadataOptionValueUpdate;
use LuzernTourismus\Pixxio\Json\File\FileJsonItem;
use LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson;

class FileImport extends AbstractMediaspaceImport
{

    protected function beforeImport()
    {

        $update = new FileUpdate();
        $update->importStatus = false;
        $update->update();

        $update = new FileMetadataUpdate();
        $update->importStatus = false;
        $update->update();

        $update = new MetadataOptionValueUpdate();
        $update->importStatus = false;
        $update->update();


    }


    protected function afterImport()
    {

        $update = new FileUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

        $update = new FileMetadataUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

        $update = new MetadataOptionValueUpdate();
        $update->active = false;
        $update->filter->andEqual($update->model->importStatus, false);
        $update->update();

    }


    public function importFile(FileJsonItem $file, $mediaspaceId)
    {

        $data = new File();
        $data->updateOnDuplicate = true;
        $data->id = $file->id;
        $data->importStatus = true;
        $data->active = true;
        $data->mediaspaceId = $mediaspaceId;
        $data->filename = $file->fileName;
        $data->fileExtension = $file->fileExtension;
        $data->fileSize = $file->fileSize;
        $data->subject = $file->subject;
        $data->description = $file->description;
        $data->fileUrl = $file->fileUrl;
        $data->previewUrl = $file->previewUrl;
        $data->directoryId = $file->directoryId;
        $data->creator = $file->creator;
        $data->save();


        foreach ($file->metadataList as $custom) {

            $data = new FileMetadata();
            $data->updateOnDuplicate = true;
            $data->active = true;
            $data->importStatus = true;
            $data->fileId = $file->id;
            $data->metadataId = $custom->id;
            if ($custom->editType == EditTypeConfig::TEXT) {

                $value = $custom->value;
                if (is_array($value)) {
                    $value = $custom->value['id'];
                }
                $data->value = $value;

            }
            $data->save();


            if ($custom->editType == EditTypeConfig::SELECTION) {

                if ($custom->value !== null) {

                    $data = new MetadataOptionValue();
                    $data->updateOnDuplicate = true;
                    $data->active = true;
                    $data->importStatus = true;
                    $data->fileId = $file->id;
                    $data->metadataId = $custom->id;
                    $data->optionId = $custom->value;
                    $data->save();

                }

            }


            if ($custom->editType == EditTypeConfig::MULTISELECTION) {

                foreach ($custom->valueList as $value) {

                    $data = new MetadataOptionValue();
                    $data->updateOnDuplicate = true;
                    $data->active = true;
                    $data->importStatus = true;
                    $data->fileId = $file->id;
                    $data->metadataId = $custom->id;
                    $data->optionId = $value;
                    $data->save();

                }

            }

        }


        foreach ($file->keywordList as $keyword) {

            $data = new Keyword();
            $data->ignoreIfExists = true;
            $data->keyword = $keyword;
            $data->save();

            $id = new KeywordId();
            $id->filter->andEqual($id->model->keyword, $keyword);
            $keywordId = $id->getId();

            $data = new FileKeyword();
            $data->ignoreIfExists = true;
            $data->fileId = $file->id;
            $data->keywordId = $keywordId;
            $data->save();

        }


    }


    protected function onMediaspace(MediaspaceRow $mediaspaceRow)
    {

        $jsonReader = new FileJsonReaderJson();
        $jsonReader->subdomain = $mediaspaceRow->url;
        $jsonReader->apiKey = $mediaspaceRow->apiKey;
        $jsonReader->pageSize = 100;  // 500;

        //$count = 0;

        do {

            foreach ($jsonReader->getData() as $file) {

                //(new Debug())->write($file->id);

                $this->importFile($file, $mediaspaceRow->id);


                /*
                $data = new File();
                $data->updateOnDuplicate = true;
                $data->id = $file->id;
                $data->importStatus = true;
                $data->active = true;
                $data->mediaspaceId = $mediaspaceRow->id;
                $data->filename = $file->fileName;
                $data->fileExtension = $file->fileExtension;
                $data->fileSize = $file->fileSize;
                $data->subject = $file->subject;
                $data->description = $file->description;
                $data->fileUrl = $file->fileUrl;
                $data->directoryId = $file->directoryId;
                $data->creator = $file->creator;
                $data->save();

                foreach ($file->metadataList as $custom) {

                    $data = new FileMetadata();
                    $data->updateOnDuplicate = true;
                    $data->fileId = $file->id;
                    $data->metadataId = $custom->id;
                    if ($custom->editType == EditTypeConfig::TEXT) {
                        $data->value = $custom->value;
                    }
                    $data->save();


                    if (($custom->editType == EditTypeConfig::SELECTION) || ($custom->editType == EditTypeConfig::MULTISELECTION)) {

                        foreach ($custom->valueList as $value) {

                            $data = new MetadataOptionValue();
                            $data->updateOnDuplicate = true;
                            $data->metadataId = $custom->id;
                            $data->optionId = $value;
                            $data->save();

                        }

                    }

                }


                foreach ($file->keywordList as $keyword) {

                    $data = new Keyword();
                    $data->ignoreIfExists = true;
                    $data->keyword = $keyword;
                    $data->save();

                    $id = new KeywordId();
                    $id->filter->andEqual($id->model->keyword, $keyword);
                    $keywordId = $id->getId();

                    $data = new FileKeyword();
                    $data->ignoreIfExists = true;
                    $data->fileId = $file->id;
                    $data->keywordId = $keywordId;
                    $data->save();

                }*/

            }

            //exit;

            /*$count++;

            if ($count ===2) {
                exit;
            }*/


        } while ($jsonReader->hasCursor());

    }

}