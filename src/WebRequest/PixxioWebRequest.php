<?php

namespace LuzernTourismus\Pixxio\WebRequest;

use LuzernTourismus\Pixxio\Config\PixxioConfig;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Directory\UniqueDirectory;
use Nemundo\Core\File\File;
use Nemundo\Core\Path\Path;
use Nemundo\Core\Text\WordList;
use Nemundo\Core\TextFile\Reader\TextFileReader;
use Nemundo\Core\TextFile\Writer\TextFileWriter;
use Nemundo\Core\WebRequest\BearerAuthentication\AbstractBearerAuthenticationWebRequest;


class PixxioWebRequest extends AbstractBearerAuthenticationWebRequest
{





    public function getData($endpoint, $parameter)
    {



        $this->bearerAuthentication= PixxioConfig::$apiKey;
        $url = 'https://'.PixxioConfig::$mediaSpace.'.px.media/api/v1/'.$endpoint.$parameter;
        $response = $this->getUrl($url);

        if (PixxioConfig::$debugMode) {

            $filename = (new Path())
                ->addPath('C:\test\pixxio_json')
                ->addPath('pixxio_'.$endpoint.'.json')
                ->getFullFilename();

            $file = new TextFileWriter($filename);
            $file->overwriteExistingFile=true;
            $file->addLine($response->html);
            $file->writeFile();

        }

        return $response;

    }



    public function uploadFile($filename, $data=[])
    {

        //$data=[];
        $data['file']=  new \CURLFile($filename, mime_content_type($filename), basename($filename));
        //$data['fileName']= (new File($filename))->getFilename();


        //$data['description']='bla bla bla';
        //$data['rotation']= 90;


        //$data['addKeywords']=$keywordList;

        /*$list = new UniqueDirectory(); new WordList();
        foreach ($keywordList as $keyword) {
            $list->add
        }*/

        //$keywordText = implode(',', $keywordList);

        //(new Debug())->write($keywordText);

        //$data['keywords']= $keywordText;
        //$data['addKeywords']= $keywordText;

        //$data['collectionIDs']= 2016354951;

        $endpoint = 'files';

        $this->bearerAuthentication= PixxioConfig::$apiKey;
        $url = $this->getServiceUrl($endpoint);

        $response = $this->postUrl($url,$data );

        (new Debug())->write($response);

    }





    //public function deleteAsset($id)
public function deleteData($endpoint,$id)
    {

        $url = $this->getServiceUrl($endpoint);
        $url .= '?ids='.$id;


        /*$data = [];
        $data['ids'] = $id;*/

        $response = $this->deleteUrl($url);

        //(new Debug())->write($response);

    }


    private function getServiceUrl($endpoint)
    {

        $this->bearerAuthentication= PixxioConfig::$apiKey;
        $url = 'https://'.PixxioConfig::$mediaSpace.'.px.media/api/v1/'.$endpoint;  //.$parameter;

        return $url;

    }


    public function postData($endpoint, $json)
    {

        (new Debug())->write($json);

        $data = $this->postUrl($this->getServiceUrl($endpoint), $json);
        return $data;

    }




}