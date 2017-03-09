<?php
/**
 * 2017 (C) Biber Ltd. | http://www.biberltd.com
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
     * Parent category id, default = 0 (Root)
     * @var int
     */
    public $parentId = 0;

    /**
     * @var int
     */
    public $projectId;

    /**
     * Type of category.
     * @var string
     */
    public $type;


    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                        => 'id',
            'elementsCount'             => 'elements_count',
            'name'                      => 'name',
            'parentId'                  => 'parent-id',
            'projectId'                 => 'project-id',
            'type'                      => 'type',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'category'})) {
            throw new InvalidDataType('category');
        }
        $responseObj = $responseObj->category;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'elementsCount':
                case 'id':
                case 'projectId':
                case 'parentId':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'dateSignedUp':
                case 'createdAt':
                    $tmpDate = \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
            }
            $setFunc = 'set' . ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Category
     */
    public function setId(int $id): Category
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getElementsCount()
    {
        return $this->elementsCount;
    }

    /**
     * @param int $elementsCount
     * @return Category
     */
    public function setElementsCount(int $elementsCount = 1): Category
    {
        $this->elementsCount = $elementsCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName(string $name): Category
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @param int $parentId
     * @return Category
     */
    public function setParentId(int $parentId): Category
    {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return Category
     */
    public function setProjectId(int $projectId): Category
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Category
     */
    public function setType(string $type): Category
    {
        $this->type = $type;
        return $this;
    }

}