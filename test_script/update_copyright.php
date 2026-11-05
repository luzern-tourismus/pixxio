<?php

require "config.php";

new \Nemundo\Core\System\PhpConfig()->setUnlimitedMemoryLimit();

\LuzernTourismus\Pixxio\Config\PixxioConfig::$debugMode = false;

$config = new \LuzernTourismus\Pixxio\Mediaspace\MediaspaceConfig();
$config->url = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_subdomain');
$config->apiKey = (new \Nemundo\Project\Config\ProjectConfigReader())->getValue('pixxio_api');


$n = 0;

$reader = new \LuzernTourismus\Pixxio\Json\File\FileJsonReaderJson();
$reader->fromMediaspaceConfig($config);
$reader->pageSize = 500;

do {

    foreach ($reader->getData() as $file) {

        $list = $file->getMetadataList();

        $copyright = $file->getMetadataValue(628208860);

        $copyrightNoticeId = 540987239;
        $copyrightNotice = $file->getMetadataValue($copyrightNoticeId);

        if ($copyright !== $copyrightNotice) {

            (new \Nemundo\Core\Debug\Debug())->write($file->id);

            $fileModifyy = new \LuzernTourismus\Pixxio\Json\File\FileModify();
            $fileModifyy->fromMediaspaceConfig($config);
            $fileModifyy->replaceStandardMetadata($copyrightNoticeId, $copyright);
            $fileModifyy->modify($file->id);

        }

        $n++;

    }

    new \Nemundo\Core\Debug\Debug()->write('n: ' . $n);

} while ($reader->hasCursor());
