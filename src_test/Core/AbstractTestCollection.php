<?php

namespace LuzernTourismus\PixxioTest\Core;

use LuzernTourismus\PixxioTest\Test\AbstractPixxioTest;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Console\ConsoleArgument;
use Nemundo\Core\Debug\Debug;
use Nemundo\Test\AbstractTest;

abstract class AbstractTestCollection extends AbstractBase
{

    /**
     * @var AbstractPixxioTest[]
     */
    protected $testList = [];


    abstract protected function loadCollection();


    public function __construct()
    {

        $this->loadCollection();

    }


    public function runScript()
    {


        $consoleArgument = new ConsoleArgument();
        $testName = $consoleArgument->getValue(1);
        $found = false;

        foreach ($this->testList as $testItem) {

            if ($testItem->getTestName() == $testName) {

                $testItem->runTest();
                $found = true;

            }

        }

        if (!$found) {

            (new Debug())
                ->write('No Test found')
                ->write();


            foreach ($this->testList as $testItem) {
                (new Debug())->write($testItem->getTestName());
            }


        }


        /*switch ($test) {

            case 'job-reader':
                (new \LuzernTourismus\PixxioTest\JobReaderTest())->runTest();
                break;


            case 'file-upload':
                (new \LuzernTourismus\PixxioTest\Builder\FileUploadTest())->runTest();
                break;



            case 'collection-builder':
                (new \LuzernTourismus\PixxioTest\Builder\CollectionBuilderTest())->runTest();
                break;


            case 'metadata':

                (new \LuzernTourismus\PixxioTest\Builder\MetadataBuilderTest())->runTest();

                break;


            default:

                (new Debug())->write('No Test found');
                break;


        }*/


    }


    protected function addTest(AbstractTest $test)
    {

        $this->testList[] = $test;
        return $this;

    }


}