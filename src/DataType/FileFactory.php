<?php
/**
 * Created by PhpStorm.
 * User: erman.titiz
 * Date: 25/10/16
 * Time: 15:25
 */

namespace BiberLtd\TeamworkApiWrapper\DataType;

class FileFactory
{
    private $object;

    public function __construct(\stdClass $responseObj = null)
    {

        if(property_exists($responseObj,'file'))
        {
            $this->object = new File($responseObj);
        }
        elseif(property_exists($responseObj,'files'))
        {
            $this->object = new Files($responseObj);
        }

        return $this->object;
    }



}