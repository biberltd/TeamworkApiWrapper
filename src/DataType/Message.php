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
 * @see http://developer.teamwork.com/datareference#message
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Message extends BaseDataType
{

    /**
     * @var int
     */
    public $attachmentsCount;

    /**
     * @var string
     */
    public $authorAvatarUrl;

    /**
     * @var string
     */
    public $authorFirstName;

    /**
     * @var int
     */
    public $authorId;

    /**
     * @var string
     */
    public $authorLastName;

    /**
     * @var string
     */
    public $body;

    /**
     * @var int
     */
    public $categoryId;

    /**
     * @var int
     */
    public $commentsCount;

    /**
     * @var string
     */
    public $displayBody;

    /**
     * @var int
     */
    public $id;

    /**
     * @var \DateTime
     */
    public $postedOn;

    /**
     * @var bool
     */
    public $private = false;

    /**
     * @var int
     */
    public $projectId;

    /**
     * @var string
     */
    public $title;

    /**
     * Message constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'attachmentsCounts'         => 'attachments-count',
            'authorAvatarUrl'           => 'author-avatar-url',
            'authorFirstName'           => 'author-first-name',
            'authorId'                  => 'author-id',
            'authorLastName'            => 'author-last-name',
            'body'                      => 'body',
            'categoryId'                => 'category-id',
            'commentsCount'             => 'comments-count',
            'displayBody'               => 'display-body',
            'id'                        => 'id',
            'postedOn'                  => 'posted-on',
            'private'                   => 'private',
            'projectId'                 => 'project-id',
            'title'                     => 'title',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'message'})) {
            throw new InvalidDataType('message');
        }
        $responseObj = $responseObj->message;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'authorId':
                case 'id':
                case 'categoryId':
                case 'projectId':
                case 'commentsCount':
                case 'attachmentsCount':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'postedOn':
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
     * @param bool $status
     * @return $this
     */
    public function setPrivate(bool $status = false){
        $this->private = $status;

        return $this;
    }

    /**
     * @return bool
     */
    public function getPrivate(){
        return $this->private;
    }

    /**
     * @return bool
     */
    public function isPrivate(){
        return $this->private;
    }

    /**
     * @return int
     */
    public function getAttachmentsCount()
    {
        return $this->attachmentsCount;
    }

    /**
     * @param int $attachmentsCount
     * @return Message
     */
    public function setAttachmentsCount(int $attachmentsCount = 0): Message
    {
        $this->attachmentsCount = $attachmentsCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorAvatarUrl()
    {
        return $this->authorAvatarUrl;
    }

    /**
     * @param string $authorAvatarUrl
     * @return Message
     */
    public function setAuthorAvatarUrl(string $authorAvatarUrl): Message
    {
        $this->authorAvatarUrl = $authorAvatarUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorFirstName()
    {
        return $this->authorFirstName;
    }

    /**
     * @param string $authorFirstName
     * @return Message
     */
    public function setAuthorFirstName(string $authorFirstName): Message
    {
        $this->authorFirstName = $authorFirstName;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return Message
     */
    public function setAuthorId(int $authorId): Message
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorLastName()
    {
        return $this->authorLastName;
    }

    /**
     * @param string $authorLastName
     * @return Message
     */
    public function setAuthorLastName(string $authorLastName): Message
    {
        $this->authorLastName = $authorLastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     * @return Message
     */
    public function setBody(string $body): Message
    {
        $this->body = $body;
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
     * @return Message
     */
    public function setCategoryId(int $categoryId): Message
    {
        $this->categoryId = $categoryId;
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
     * @return Message
     */
    public function setCommentsCount(int $commentsCount = 0): Message
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayBody()
    {
        return $this->displayBody;
    }

    /**
     * @param string $displayBody
     * @return Message
     */
    public function setDisplayBody(string $displayBody): Message
    {
        $this->displayBody = $displayBody;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Message
     */
    public function setId(int $id): Message
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getPostedOn(bool $forTw = false)
    {
        if(!$forTw){
            return $this->postedOn;
        }
        return $this->postedOn->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param string $postedOn
     * @return Message
     */
    public function setPostedOn(string $postedOn): Message
    {
        $this->postedOn = $postedOn;
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
     * @return Message
     */
    public function setProjectId(int $projectId): Message
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Message
     */
    public function setTitle(string $title): Message
    {
        $this->title = $title;
        return $this;
    }

}