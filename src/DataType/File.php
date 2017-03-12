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

class File extends BaseDataType
{
    /**
     * @var int
     */
    private $projectId;

    /**
     * @var bool
     */
    private $canUploadNewVersion = true;

    /**
     * format: "Y-m-d\TH:i:s\Z"
     * @var \DateTime
     */
    private $uploadedDate;

    /**
     * @var string
     */
    private $extraData;

    /**
     * Represented as 0,1 in TW.
     * @var bool
     */
    private $private;

    /**
     * @var int
     */
    private  $versionId;

    /**
     * @var bool
     */
    private $userFollowingCommnets = false;

    /**
     * @var int
     */
    private $commentsCount = 0;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $changeFollwerIds;

    /**
     * @var array
     */
    private $tags;

    /**
     * @var int
     */
    private $version;

    /**
     * @var int
     */
    private $id;

    /**
     * format: "Y-m-d\TH:i:s\Z"
     * @var \DateTime
     */
    private $lastChangedOn;
    /**
     * @var string
     */
    private $commentFollowerIds;

    /**
     * @var bool
     */
    private $shareable = true;

    /**
     * @var array
     */
    private $versions = [];

    /**
     * @var string
     */
    private $thumbUrl;

    /**
     * @var string
     */
    private $uploadedByUserFirstName;

    /**
     * @var string
     */
    private $uploadedByUserLastName;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $uploadedByUserId;

    /**
     * @var bool
     */
    private $userFollowingChanges = false;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var string
     */
    private $originalName;

    /**
     * @var int
     */
    private $size;

    /**
     * @var string
     */
    private $fileSource;

    /**
     * @var string
     */
    private $categoryName;

    /**
     * File constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'projectId'                 => 'project-id',
            'canUploadNewVersion'       => 'can-upload-new-version',
            'uploadedDate'              => 'uploaded-date',
            'extraData'                 => 'extra-data',
            'private'                   => 'private',
            'versionId'                 => 'version-id',
            'userFollowingComments'     => 'userFollowingComments',
            'commentsCount'             => 'comments-count',
            'status'                    => 'status',
            'changeFollowerIds'         => 'changeFollowerIds',
            'tags'                      => 'tags',
            'version'                   => 'version',
            'id'                        => 'id',
            'lastChangedOn'             => 'last-changed-on',
            'commentFollowerIds'        => 'commentFollowerIds',
            'shareable'                 => 'shareable',
            'versions'                  => 'versions',
            'thumbUrl'                  => 'thumbUrl',
            'uploadedByUserFirstName'   => 'uploaded-by-user-first-name',
            'uploadedByUserLastName'    => 'uploaded-by-user-last-name',
            'name'                      => 'name',
            'uploadedByUserId'          => 'uploaded-by-userId',
            'userFollowingChanges'      => 'userFollowingChanges',
            'description'               => 'description',
            'categoryId'                => 'category-id',
            'originalName'              => 'originalName',
            'size'                      => 'size',
            'fileSource'                => 'file-source',
            'categoryName'              => 'category-name',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'time-entry'})) {
            throw new InvalidDataType('time-entry');
        }
        $responseObj = $responseObj->{'time-entry'};

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'projectId':
                case 'commentsCount':
                case 'version':
                case 'id':
                case 'uploadedByUserId':
                case 'size':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'uploadedDate':
                case 'lastChangedOn':
                    $tmpDate = \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'private':
                case 'taskListPrivate':
                case 'timeIsLogged':
                case 'hasPredecessors':
                case 'hasDependencies':
                    $responseObj->{$propValue} = $responseObj->{$propValue} == 0 ? 0 : 1;
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
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return File
     */
    public function setProjectId(int $projectId): File
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanUploadNewVersion(){
        return $this->canUploadNewVersion;
    }
    /**
     * @return bool
     */
    public function canUploadNewVersion()
    {
        return $this->canUploadNewVersion;
    }

    /**
     * @param bool $canUploadNewVersion
     * @return File
     */
    public function setCanUploadNewVersion(bool $canUploadNewVersion): File
    {
        $this->canUploadNewVersion = $canUploadNewVersion;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUploadedDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->uploadedDate;
        }
        return $this->uploadedDate->format('Y-m-d\TH:i:s\z');
    }

    /**
     * @param \DateTime $uploadedDate
     * @return File
     */
    public function setUploadedDate(\DateTime $uploadedDate): File
    {
        $this->uploadedDate = $uploadedDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getExtraData()
    {
        return $this->extraData;
    }

    /**
     * @param string $extraData
     * @return File
     */
    public function setExtraData(string $extraData): File
    {
        $this->extraData = $extraData;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getPrivate(bool $forTw = false){
        if(!$forTw){
            return $this->private;
        }
        return !$this->private ? 0 : 1;
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
     * @return File
     */
    public function setPrivate(bool $private): File
    {
        $this->private = $private;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersionId()
    {
        return $this->versionId;
    }

    /**
     * @param int $versionId
     * @return File
     */
    public function setVersionId(int $versionId): File
    {
        $this->versionId = $versionId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUserFollowingCommnets()
    {
        return $this->userFollowingCommnets;
    }

    /**
     * @param $userFollowingCommnets
     * @return $this
     */
    public function setUserFollowingCommnets(bool $userFollowingCommnets = false)
    {
        $this->userFollowingCommnets = $userFollowingCommnets;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentsCount()
    {
        return $this->commentsCount;
    }

    /**
     * @param int $commentsCount
     * @return File
     */
    public function setCommentsCount(int $commentsCount = 0): File
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return File
     */
    public function setStatus(string $status): File
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getChangeFollwerIds()
    {
        return $this->changeFollwerIds;
    }

    /**
     * @param string $changeFollwerIds
     * @return File
     */
    public function setChangeFollwerIds(string $changeFollwerIds): File
    {
        $this->changeFollwerIds = $changeFollwerIds;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param array $tags
     * @return File
     */
    public function setTags(array $tags): File
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return File
     */
    public function setVersion(int $version): File
    {
        $this->version = $version;
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
     * @return File
     */
    public function setId(int $id): File
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastChangedOn(bool $forTw = false)
    {
        if(!$forTw){
            return $this->lastChangedOn;
        }
        return $this->lastChangedOn;
    }

    /**
     * @param \DateTime $lastChangedOn
     * @return File
     */
    public function setLastChangedOn(\DateTime $lastChangedOn): File
    {
        $this->lastChangedOn = $lastChangedOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentFollowerIds()
    {
        return $this->commentFollowerIds;
    }

    /**
     * @param string $commentFollowerIds
     * @return File
     */
    public function setCommentFollowerIds(string $commentFollowerIds): File
    {
        $this->commentFollowerIds = $commentFollowerIds;
        return $this;
    }

    /**
     * @return bool
     */
    public function getShareable(){
        return $this->shareable;
    }
    /**
     * @return bool
     */
    public function isShareable()
    {
        return $this->shareable;
    }

    /**
     * @param bool $shareable
     * @return File
     */
    public function setShareable(bool $shareable): File
    {
        $this->shareable = $shareable;
        return $this;
    }

    /**
     * @return array
     */
    public function getVersions()
    {
        return $this->versions;
    }

    /**
     * @param array $versions
     * @return File
     */
    public function setVersions(array $versions): File
    {
        $this->versions = $versions;
        return $this;
    }

    /**
     * @return string
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * @param string $thumbUrl
     * @return File
     */
    public function setThumbUrl(string $thumbUrl): File
    {
        $this->thumbUrl = $thumbUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getUploadedByUserFirstName()
    {
        return $this->uploadedByUserFirstName;
    }

    /**
     * @param string $uploadedByUserFirstName
     * @return File
     */
    public function setUploadedByUserFirstName(string $uploadedByUserFirstName): File
    {
        $this->uploadedByUserFirstName = $uploadedByUserFirstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUploadedByUserLastName()
    {
        return $this->uploadedByUserLastName;
    }

    /**
     * @param string $uploadedByUserLastName
     * @return File
     */
    public function setUploadedByUserLastName(string $uploadedByUserLastName): File
    {
        $this->uploadedByUserLastName = $uploadedByUserLastName;
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
     * @return File
     */
    public function setName(string $name): File
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getUploadedByUserId()
    {
        return $this->uploadedByUserId;
    }

    /**
     * @param int $uploadedByUserId
     * @return File
     */
    public function setUploadedByUserId(int $uploadedByUserId): File
    {
        $this->uploadedByUserId = $uploadedByUserId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUserFollowingChanges(){
        return $this->userFollowingChanges;
    }
    /**
     * @return bool
     */
    public function isUserFollowingChanges()
    {
        return $this->userFollowingChanges;
    }

    /**
     * @param bool $userFollowingChanges
     * @return File
     */
    public function setUserFollowingChanges(bool $userFollowingChanges): File
    {
        $this->userFollowingChanges = $userFollowingChanges;
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
     * @return File
     */
    public function setDescription(string $description): File
    {
        $this->description = $description;
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
     * @return File
     */
    public function setCategoryId(int $categoryId): File
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     * @return File
     */
    public function setOriginalName(string $originalName): File
    {
        $this->originalName = $originalName;
        return $this;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return File
     */
    public function setSize(int $size): File
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileSource()
    {
        return $this->fileSource;
    }

    /**
     * @param string $fileSource
     * @return File
     */
    public function setFileSource(string $fileSource): File
    {
        $this->fileSource = $fileSource;
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
     * @return File
     */
    public function setCategoryName(string $categoryName): File
    {
        $this->categoryName = $categoryName;
        return $this;
    }
}