<?php

require __DIR__ . '/../config.php';


/*$subdomain = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$api = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');
*/

$mediaspace = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$mediaspace->url = new \Nemundo\Project\Config\ProjectConfigReader()->getValue('pixxio_subdomain');
$mediaspace->apiKey = new \Nemundo\Project\Config\ProjectConfigReader()->getValue('pixxio_api');

$n = 0;

$reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
$reader->fromMediaspaceConfig($mediaspace);
/*$reader->subdomain = $subdomain;
$reader->apiKey = $api;*/
//$reader->pageSize = 1;
$reader->filterByDirectoryId = 198885700;

do {

    foreach ($reader->getData() as $file) {
        //(new \Nemundo\Core\Debug\Debug())->write($file->fileName);
        //(new \Nemundo\Core\Debug\Debug())->write($file->id);

        $modify = new \LuzernTourismus\Pixxio\Json\File\FileModify();  // new \LuzernTourismus\Pixxio\Json\File\FileJsonItem()Json();
        $modify
            ->fromMediaspaceConfig($mediaspace)
            ->addKeyword('NWT')
            ->addKeyword('Juiz Region')
            ->addKeyword('Nidwalden Tourismus')
            ->modify($file->id);


        //«NWT», «Juiz Region» und «Nidwalden Tourismus»

        $n++;

        new \Nemundo\Core\Debug\Debug()->write($n . ' - ' . $file->id);

    }

} while ($reader->hasCursor());

