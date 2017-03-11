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
 * @see http://developer.teamwork.com/datareference#comment
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Link extends BaseDataType
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $projectId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $createdByUserFirstName;

    /**
     * @var int
     */
    private $height;

    /**
     * Represented as 1 and 0 in TW.
     * @var bool
     */
    private $private;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $createdByUserId;

    /**
     * @var string
     */
    private $createdByUserLastName;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var string
     */
    private $projectName;

    /**
     * @var bool
     */
    private $openInNewWindow;

    /**
     * @var string
     */
    private $provider;

    /**
     * format "Y-m-d\T:H:i:s\Z"
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * @var string
     */
    private $code;

    /**
     * Comment constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                        => 'id',
            'projectId'                 => 'project-id',
            'name'                      => 'author-firstName',
            'description'               => 'descripiton',
            'createdByUserFirstName'    => 'created-by-userfirstname',
            'height'                    => 'height',
            'private'                   => 'private',
            'width'                     => 'width',
            'createdByUserId'           => 'created-by-userId',
            'createdByUserLastName'     => 'created-by-userlastname',
            'categoryId'                => 'category-id',
            'projectName'               => 'project-name',
            'openInNewWindow'           => 'open-in-new-window',
            'provider'                  => 'provider',
            'createdDate'               => 'created-date',
            'categoryName'              => 'category-name',
            'code'                      => 'code',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'link'})) {
            throw new InvalidDataType('link');
        }
        $responseObj = $responseObj->link;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'projectId':
                case 'id':
                case 'createdByUserId':
                case 'categoryId':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'dateTimecreatedDate':
                    $tmpDate = \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'private':
                    $responseObj->{$propValue} =  $responseObj->{$propValue} == 0 ? false : true;
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
     * @return Link
     */
    public function setId(int $id): Link
    {
        $this->id = $id;
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
     * @return Link
     */
    public function setProjectId(int $projectId): Link
    {
        $this->projectId = $projectId;
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
     * @return Link
     */
    public function setName(string $name): Link
    {
        $this->name = $name;
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
     * @return Link
     */
    public function setDescription(string $description): Link
    {
        $this->description = $description;
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
     * @param string $firstName
     * @return Link
     */
    public function setCreatedByUserFirstName(string $firstName): Link
    {
        $this->createdByUserFirstName = $firstName;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Link
     */
    public function setHeight(int $height): Link
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool
     */
    public function getPrivate(bool $forTw = false){
        if(!$forTw){
            return $this->private;
        }
        return $this->private;
    }
    /**
     * @return bool
     */
    public function isPrivate()
    {
        return $this->private;
    }

    /**
     * @param bool $private
     * @return Link
     */
    public function setPrivate(bool $private): Link
    {
        $this->private = $private;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Link
     */
    public function setWidth(int $width): Link
    {
        $this->width = $width;
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
     * @return Link
     */
    public function setCreatedByUserId(int $createdByUserId): Link
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
     * @return Link
     */
    public function setCreatedByUserLastName(string $createdByUserLastName): Link
    {
        $this->createdByUserLastName = $createdByUserLastName;
        return $this;
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
     * @return Link
     */
    public function setCategoryId(int $categoryId): Link
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProjectName()
    {
        return $this->projectName;
    }

    /**
     * @param string $projectName
     * @return Link
     */
    public function setProjectName(string $projectName): Link
    {
        $this->projectName = $projectName;
        return $this;
    }

    public function isOpenInNewWindow()
    {
        return $this->openInNewWindow;
    }

    /**
     * @param bool $openInNewWindow
     * @return Link
     */
    public function setOpenInNewWindow(bool $openInNewWindow): Link
    {
        $this->openInNewWindow = $openInNewWindow;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     * @return Link
     */
    public function setProvider(string $provider): Link
    {
        $this->provider = $provider;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     * @return Link
     */
    public function setCreatedDate(\DateTime $createdDate): Link
    {
        $this->createdDate = $createdDate;
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
     * @return Link
     */
    public function setCategoryName(string $categoryName): Link
    {
        $this->categoryName = $categoryName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Link
     */
    public function setCode(string $code): Link
    {
        $this->code = $code;
        return $this;
    }
}