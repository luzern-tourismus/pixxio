<?php

namespace LuzernTourismus\Pixxio\Json\User;

use LuzernTourismus\Pixxio\Json\Base\AbstractJsonPixxioReader;
use LuzernTourismus\Pixxio\Json\Comment\CommentJsonItem;
use LuzernTourismus\Pixxio\Json\MediaspaceConfigTrait;
use Nemundo\Core\Http\Url\UrlBuilder;
use Nemundo\Core\Type\DateTime\DateTime;

class UserJsonReader extends AbstractJsonPixxioReader
{

    use MediaspaceConfigTrait;

    public $fileId;


    protected function loadReader()
    {

        //https://[EXAMPLE-MEDIASPACE].px.media/api/unstable/users

        $this->endpoint = 'users';

        $url = new UrlBuilder('');
        $url->addRequestValue('page',1);
        $url->addRequestValue('pageSize',100);
        $url->addRequestValue('responseFields', 'id,userName,displayName,email');


/*        Array of strings (Array of ResponseFields)
Default: "id&responseFields=displayName"
Items Enum: "apiKeys" "azureActiveDirectoryID" "createDate" "displayName" "email" "externalID" "firstName" "homeDirectory" "id" "isActive" "isExternal" "isLinked" "isReadOnly" "isSupportUser" "language" "lastName" "ldapID" "modifyDate" "permissionGroups" "refreshToken" "twoFactorAuthSetUp" "userName"*/


        $this->parameter =  $url->getUrl();
        $this->loopName = 'users';

    }


    protected function onJson($json)
    {

        //id,userName,displayName,email

        $item = new UserJsonItem();
        $item->id = $json['id'];
        $item->userName = $json['userName'];
        $item->displayName = $json['displayName'];
        $item->email = $json['email'];

        $this->addItem($item);

    }


    /**
     * @return UserJsonItem[]
     */
    public function getData()
    {

        $this->loaded = false;
        return parent::getData();

    }

}