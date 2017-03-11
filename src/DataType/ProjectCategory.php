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
 * @see http://developer.teamwork.com/datareference#milestone
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class ProjectCategory extends BaseDataType
{
    /**
     * @var string
     */
    private $name;
    
    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $elementsCount;

    /**
     * @var int
     */
    private $parentId;

    /**
     * Project constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                            => 'id',
            'name'                          => 'name',
            'elementsCount'                 => 'elements_count',
            'type'                          => 'type',
            'parentId'                      => 'parent-id',
        ];
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
        $responseObj = $responseObj->category;
        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(!isset($responseObj->{$propValue}))
            {
               continue;
            }
            switch($propIndex){
                case 'companyId':
                case 'parentId':
                case 'elementsCount':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
            }
            $setFunc = 'set'.ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
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
     * @return ProjectCategory
     */
    public function setName(string $name): ProjectCategory
    {
        $this->name = $name;
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
     * @return ProjectCategory
     */
    public function setType(string $type): ProjectCategory
    {
        $this->type = $type;
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
     * @param int $id
     * @return ProjectCategory
     */
    public function setParentId(int $id): ProjectCategory
    {
        $this->parentId = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
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
     * @param $elementsCount
     * @return $this
     */
    public function setElementsCount($elementsCount = 0)
    {
        $this->elementsCount = $elementsCount;
        return $this;
    }


}