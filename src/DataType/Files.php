<?php
/**
 * Created by PhpStorm.
 * User: erman.titiz
 * Date: 24/10/16
 * Time: 13:52
 */

namespace BiberLtd\TeamworkApiWrapper\DataType;
use BiberLtd\TeamworkApiWrapper\DataType\File;

class Files extends FileAbstract
{
    /**
     * @var array
     */
    public $files;

    protected $extendData=array();

    public function __construct(\stdClass $responseObj = null){
        $files = [];
        foreach($responseObj->files as $file)
        {
            $new_file = new File($file);
            $new_file->extendData = [
                'commentsCountRead'         => 'read-comments-count'
            ];
            $files[] = $new_file;
        }
        $this->files = $files;
    }
}