<?php

namespace LuzernTourismus\Pixxio\Json\CustomMetadata;

use Nemundo\Core\Base\AbstractBase;

class CustomMetadataItem extends AbstractBase
{

    public $id;

    public $name;

    public $type;

    /**
     * @var OptionItem[]
     */
    private $optionList=[];


    public function __construct($json)
    {


        foreach ($json['selectionOptions'] as $selectionOption) {

            $option = new OptionItem($selectionOption);
            $this->optionList[] = $option;

        }


    }


    public function getOptionList()
    {

        return $this->optionList;

    }



}