<?php
/**
 * 2016 (C) Biber Ltd. | http://www.biberltd.com
 *
 * @license     MIT
 * @author      Can Berkol
 *
 * Developed by Biber Ltd. (http://www.biberltd.com), a partner of BOdev Office (http://www.bodevoffice.com)
 *
 * Check http://team.bodevoffice.com for technical documentation or consult your representative.
 *
 * Contact support@bodevoffice.com for support requests.
 *
 * @see http://developer.teamwork.com/datareference#category
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Category extends BaseDataType
{

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $elementsCount;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $parentId;

    /**
     * @var int
     */
    public $projectId;

    /**
     * @var string
     */
    public $type;


    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->category)){
            throw new InvalidDataType('category');
        }

        $catDetails = $responseObj->category;

        $this->id = $catDetails->id;
        $this->elementsCount = $catDetails->elements_count;
        $this->name = $catDetails->name;
        $this->parentId = $catDetails->{'parent-id'};
        $this->projectId = $catDetails->{'project-id'};
        $this->type = $catDetails->type;

    }
}