<?php

namespace LuzernTourismus\Pixxio\Json\Collection;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;

class CollectionJsonReader extends AbstractJsonPixxioReader
{

    protected function loadReader()
    {

        $this->endpoint = 'collections';
        $this->parameter = '?page=1&pageSize=20&responseFields=id,name,isDynamic,user';


        //$this->parameter = '?collectionIDs=918404315&page=1&pageSize=20&responseFields=id,name,isDynamic,assetNavigator,previewFiles,user&assetNavigatorResponseFields=id';


        //$this->endpoint= 'collections/918404315';

        $this->loopName = 'collections';


/*
        Array of strings (Array of ResponseFields)
Default: "id&responseFields=name"
Items Enum: "assetNavigator" "createDate" "description" "filesQuantity" "filesQuantityWithFilter" "id" "isDeleted" "isDynamic" "isSharedExternally" "isSharedGlobally" "isSharedInternally" "modifyDate" "name" "permissions" "previewFiles" "sharedPermissionGroups" "sharedUsers" "translationState" "user" "userHasPermissionForCollection"
Example: responseFields=id
  */

    }


    protected function onJson($json)
    {

        $item = new CollectionItem();
        $item->id = $json['id'];
        $item->collection = $json['name'];
        $item->userId = $json['user']['id'];
        $item->dynamicCollection = $json['isDynamic'];

        $this->addItem($item);

    }


    /**
     * @return CollectionItem[]
     */
    public function getData()
    {

        return parent::getData();

    }

}