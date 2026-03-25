<?php

namespace LuzernTourismus\Pixxio\Builder;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Directory\TextDirectory;

class CustomMetaBuilder extends AbstractBuilder
{

    public $name;

    public $editType;


    /**
     * @var TextDirectory
     */
    protected $optionList;


    public function __construct()
    {

        $this->optionList = new TextDirectory();

    }



    public function build()
    {

        $data = [];
        $data['name'] = $this->name;
        $data['editType'] = $this->editType;
        $data['selectionOptions'] = $this->optionList->getTextWithSeperator(',');
        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->postData('metadata/custom', $data);

        (new Debug())->write($response);


    }


    public function addOption($option)
    {

        $this->optionList->addValue( $option);
        return $this;

    }


    public function upddate($id)
    {

        $data = [];
        $data['selectionOptionsToAdd'] = $this->optionList->getTextWithSeperator(',');

        $request = new PixxioWebRequest();
        $request->subdomain = $this->subdomain;
        $request->apiKey = $this->apiKey;
        $response = $request->putData('metadata/custom/' . $id, $data);

        (new Debug())->write($response);


    }


}