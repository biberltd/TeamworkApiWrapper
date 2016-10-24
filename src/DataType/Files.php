<?php
/**
 * Created by PhpStorm.
 * User: erman.titiz
 * Date: 24/10/16
 * Time: 13:52
 */

namespace BiberLtd\TeamworkApiWrapper\DataType;
use BiberLtd\TeamworkApiWrapper\DataType\File;

class Files
{
    /**
     * @var array
     */
    public $files;

    public function __construct(\stdClass $responseObj = null){
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        $files = [];
        foreach($responseObj->files as $file)
        {
            $files[]= new File($file);
        }
        $this->files = $files;
    }
}