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
 * @see http://developer.teamwork.com/datareference#notebook
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Notebook extends BaseDataType
{

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $createdByUserFirstName;

    /**
     * @var int
     */
    private $createdByUserId;

    /**
     * @var string
     */
    private $createdByUserLastName;

    /**
     * Format: Y-m-dTH:i:sZ
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $id;

    /**
     * Team sends this as integer.
     * @var bool
     */
    private $locked = false;

    /**
     * @var string
     */
    private $lockedByUserFirstName;

    /**
     * @var int
     */
    private $lockedByUserId;

    /**
     * @var string
     */
    private $lockedByUserLastName;

    /**
     * @var \DateTime
     */
    private $lockedDate;

    /**
     * @var string
     */
    private $name;

    /**
     * Team sends this as integer.
     * @var bool
     */
    private $private = false;

    /**
     * @var int
     */
    private $projectId;

    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'categoryId'                 => 'category-id',
            'categoryName'               => 'category-name',
            'content'                    => 'content',
            'createdByUserFirstName'     => 'created-by-userfirstname',
            'createdByUserId'            => 'created-by-userId',
            'createdByUserLastName'      => 'created-by-userlastname',
            'createdDate'                => 'created-date',
            'description'                => 'description',
            'id'                         => 'id',
            'locked'                     => 'locked',
            'lockedByUserFirstName'      => 'locked-by-userfirstname',
            'lockedByUserId'             => 'locked-by-userId',
            'lockedByUserLastName'       => 'locked-by-userlastname',
            'lockedDate'                 => 'locked-date',
            'name'                       => 'name',
            'private'                    => 'private',
            'projectId'                  => 'project-id',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->notebook)){
            throw new InvalidDataType('notebook');
        }
        $responseObj = $responseObj->notebook;

        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(!isset($responseObj->{$propValue}))
            {
                continue;
            }
            switch($propIndex){
                case 'id':
                case 'categoryId':
                case 'createdByUserId':
                case 'lockedByUserId':
                case 'projectId':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'createdDate':
                case 'lockedDate':
                    $tmpDate =  \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'private':
                case 'locked':
                    $responseObj->{$propValue} = $responseObj->{$propValue} === 0 ? false : true;
                    break;
            }
            $setFunc = 'set'.ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return $this
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     * @return $this
     */
    public function setCategoryName(string $categoryName)
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return $this
     */
    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedByUserFirstName()
    {
        return $this->createdByUserFirstName;
    }

    /**
     * @param string $createdByUserFirstName
     * @return $this
     */
    public function setCreatedByUserFirstName(string $createdByUserFirstName)
    {
        $this->createdByUserFirstName = $createdByUserFirstName;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedByUserId()
    {
        return $this->createdByUserId;
    }

    /**
     * @param int $createdByUserId
     * @return $this
     */
    public function setCreatedByUserId(int $createdByUserId)
    {
        $this->createdByUserId = $createdByUserId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedByUserLastName()
    {
        return $this->createdByUserLastName;
    }

    /**
     * @param string $createdByUserLastName
     * @return $this
     */
    public function setCreatedByUserLastName(string $createdByUserLastName)
    {
        $this->createdByUserLastName = $createdByUserLastName;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getCreatedDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->createdDate;
        }
        return $this->createdDate->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $createdDate
     * @return $this
     */
    public function setCreatedDate(\DateTime $createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
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
     * @param int $id
     * @return $this
     */
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getLocked(bool $forTw = false)
    {
        if($forTw){
            return !$this->locked ? 0 : 1;
        }
        return $this->locked;
    }

    /**
     * @return bool
     */
    public function isLocked()
    {
        return $this->getLocked();
    }

    /**
     * @param bool $locked
     * @return $this
     */
    public function setLocked(bool $locked = false)
    {
        $this->locked = $locked;
        return $this;
    }

    /**
     * @return string
     */
    public function getLockedByUserFirstName()
    {
        return $this->lockedByUserFirstName;
    }

    /**
     * @param string $lockedByUserFirstName
     * @return $this
     */
    public function setLockedByUserFirstName(string $lockedByUserFirstName)
    {
        $this->lockedByUserFirstName = $lockedByUserFirstName;
        return $this;
    }

    /**
     * @return int
     */
    public function getLockedByUserId()
    {
        return $this->lockedByUserId;
    }

    /**
     * @param int $lockedByUserId
     * @return $this
     */
    public function setLockedByUserId(int $lockedByUserId)
    {
        $this->lockedByUserId = $lockedByUserId;
        return $this;
    }

    /**
     * @return string
     */
    public function getLockedByUserLastName()
    {
        return $this->lockedByUserLastName;
    }

    /**
     * @param $lockedByUserLastName
     * @return $this
     */
    public function setLockedByUserLastName($lockedByUserLastName)
    {
        $this->lockedByUserLastName = $lockedByUserLastName;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLockedDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->lockedDate;
        }
        return $this->lockedDate->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param $lockedDate
     * @return $this
     */
    public function setLockedDate($lockedDate)
    {
        $this->lockedDate = $lockedDate;
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
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }
    public function getPrivate(bool $forTw = false){
        if($forTw){
            return !$this->private ? 0 : 1;
        }
        return $this->private;
    }
    /**
     * @return bool
     */
    public function isPrivate()
    {
        return $this->getPrivate();
    }

    /**
     * @param bool $private
     * @return $this
     */
    public function setPrivate(bool $private = false)
    {
        $this->private = $private;
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
     * @return $this
     */
    public function setProjectId(int $projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }
}