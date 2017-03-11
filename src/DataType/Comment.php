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

class Comment extends BaseDataType
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
     * @var string
     */
    public $authorLastName;

    /**
     * @var int
     */
    public $authorId;

    /**
     * @var string
     */
    public $body;

    /**
     * @var int
     */
    public $commentableId;

    /**
     * todo_items, milestones, notebooks, links, files
     * @var string
     */
    public $commentableType = "todo_items";

    /**
     * @var \DateTime
     */
    public $dateTime;

    /**
     * @var string
     */
    public $emailedFrom;

    /**
     * @var int
     */
    public $id;
    /**
     * @var bool
     */
    public $private = false;

    /**
     * Comment constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'attachmentsCount'          => 'attachments-count',
            'authorAvatarUrl'           => 'author-avatar-url',
            'authorFirstName'           => 'author-firstName',
            'authorId'                  => 'author_id',
            'authorLastName'            => 'author-lastname',
            'body'                      => 'body',
            'commentableId'             => 'commentable-id',
            'commentableType'           => 'commentable_type',
            'dateTime'                  => 'datetime',
            'emailedFrom'               => 'emailed-from',
            'id'                        => 'id',
            'private'                   => 'private',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'comment'})) {
            throw new InvalidDataType('comment');
        }
        $responseObj = $responseObj->comment;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'authorId':
                case 'id':
                case 'commentableId':
                case 'attachmentsCount':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'dateTime':
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
     * If a non-allwed value is sent type is set to "todo_items"
     * @param string $type
     * @return $this
     */
    public function setCommentableType(string $type = 'todo_items'){
        switch($type){
            case  'todo_items':
            case  'milestones':
            case  'notebooks':
            case  'links':
            case  'files':
                break;
            default:
                $type = 'todo_items';
                break;
        }
        $this->commentableType = $type;
        return $this;
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
     * @return Comment
     */
    public function setAttachmentsCount(int $attachmentsCount = 0): Comment
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
     * @return Comment
     */
    public function setAuthorAvatarUrl(string $authorAvatarUrl = ''): Comment
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
     * @return Comment
     */
    public function setAuthorFirstName(string $authorFirstName): Comment
    {
        $this->authorFirstName = $authorFirstName;
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
     * @return Comment
     */
    public function setAuthorLastName(string $authorLastName): Comment
    {
        $this->authorLastName = $authorLastName;
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
     * @return Comment
     */
    public function setAuthorId(int $authorId): Comment
    {
        $this->authorId = $authorId;
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
     * @return Comment
     */
    public function setBody(string $body): Comment
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return int
     */
    public function getCommentableId()
    {
        return $this->commentableId;
    }

    /**
     * @param int $commentableId
     * @return Comment
     */
    public function setCommentableId(int $commentableId): Comment
    {
        $this->commentableId = $commentableId;
        return $this;
    }

    /**
     * @return string
     */
    public function getDateTime(bool $forTw = false)
    {
        if(!$forTw){
            return $this->dateTime;
        }
        return $this->dateTime->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param string $dateTime
     * @return Comment
     */
    public function setDateTime(string $dateTime): Comment
    {
        $this->dateTime = $dateTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailedFrom()
    {
        return $this->emailedFrom;
    }

    /**
     * @param string $emailedFrom
     * @return Comment
     */
    public function setEmailedFrom(string $emailedFrom): Comment
    {
        $this->emailedFrom = $emailedFrom;
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
     * @return Comment
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    public function getPrivate(){
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
     * @return Comment
     */
    public function setPrivate(bool $private): Comment
    {
        $this->private = $private;
        return $this;
    }

}