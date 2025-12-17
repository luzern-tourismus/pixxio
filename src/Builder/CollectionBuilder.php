<?php

namespace LuzernTourismus\Pixxio\Builder;

use LuzernTourismus\Pixxio\WebRequest\PixxioWebRequest;
use Nemundo\Core\Debug\Debug;

class CollectionBuilder extends AbstractBuilder
{

    public $collection;

    public function build() {

        $data = [];
        $data['name'] = $this->collection;

        $response = (new PixxioWebRequest())->postData('collections', $data);

        (new Debug())->write($response);




    }

}