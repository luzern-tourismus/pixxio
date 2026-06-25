<?php

namespace LuzernTourismus\Pixxio\Com\Form;

use LuzernTourismus\Pixxio\Data\Mediaspace\Mediaspace;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceModel;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceReader;
use LuzernTourismus\Pixxio\Data\Mediaspace\MediaspaceUpdate;
use LuzernTourismus\Pixxio\Setup\MediaspaceSetup;
use Nemundo\Admin\Com\Form\AbstractAdminEditForm;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Admin\Com\ListBox\AdminTextBox;

class MediaspaceForm extends AbstractAdminEditForm
{

    /**
     * @var AdminTextBox
     */
    private $url;
    
    /**
     * @var AdminTextBox
     */
    private $apiKey;
    
    public function getContent()
    {

        $model = new MediaspaceModel();

        $this->url = new AdminTextBox($this);
        $this->url->label = $model->url->label;
        $this->url->validation = true;

        $this->apiKey = new AdminTextBox($this);
        $this->apiKey->label = $model->apiKey->label;
        $this->apiKey->validation = true;

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $mediaspaceRow = (new MediaspaceReader())->getRowById($this->dataId);
        $this->url->value = $mediaspaceRow->url;
        $this->apiKey->value = $mediaspaceRow->apiKey;

    }


    protected function onSave()
    {

        $data = new Mediaspace();
        //$data->updateOnDuplicate = true;
        //$data->mediaspace = $this->mediaspace;
        $data->url = $this->url->getValue();
        $data->apiKey = $this->apiKey->getValue();
        $data->save();

    }


    protected function onUpdate()
    {

        $data = new MediaspaceUpdate();
        //$data->updateOnDuplicate = true;
        //$data->mediaspace = $this->mediaspace;
        $data->url = $this->url->getValue();
        $data->apiKey = $this->apiKey->getValue();
        $data->updateById($this->dataId);  // save();

    }





    /*protected function onSubmit()
    {

        (new MediaspaceSetup())->addMediaspace($this->url->getValue(),$this->apiKey->getValue());

        /*$data = new Mediaspace();
        $data->ignoreIfExists = true;
        $data->url = $this->url->getValue();
        $data->save();*/

    //}

}