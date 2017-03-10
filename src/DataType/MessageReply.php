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
 * @see http://developer.teamwork.com/datareference#message_reply
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class MessageReply extends BaseDataType
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
     * @var int
     */
    public $id;
    /**
     * @var int
     */
    public $messageId;
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
    public $replyNo;
    /**
     * @var string
     */
    public $title;

    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'attachmentsCount'          => 'attachments-count',
            'authorAvatarUrl'           => 'author-avatar-url',
            'authorFirstName'           => 'author-firstname',
            'authorId'                  => 'author-id',
            'authorLastName'            => 'author-lastname',
            'body'                      => 'body',
            'categoryId'                => 'category-id',
            'commentsCount'             => 'commnets-count',
            'id'                        => 'id',
            'messageId'                 => 'messageId',
            'postedOn'                  => 'posted-on',
            'private'                   => 'private',
            'replyNo'                   => 'replyNo',
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
        if (!isset($responseObj->{'messageReplies'})) {
            throw new InvalidDataType('messageReplies');
        }
        $responseObj = $responseObj->messageReplies;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'authorId':
                case 'id':
                case 'categoryId':
                case 'messageId':
                case 'replyNo':
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
     * @param bool|null $status
     * @return $this
     */
    public function setPrivate(bool $status = null){
        $status = $status ?? $this->private;
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
     * @return MessageReply
     */
    public function setAttachmentsCount(int $attachmentsCount = 0): MessageReply
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
     * @return MessageReply
     */
    public function setAuthorAvatarUrl(string $authorAvatarUrl = ''): MessageReply
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
     * @return MessageReply
     */
    public function setAuthorFirstName(string $authorFirstName): MessageReply
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
     * @return MessageReply
     */
    public function setAuthorId(int $authorId): MessageReply
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
     * @return MessageReply
     */
    public function setAuthorLastName(string $authorLastName): MessageReply
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
     * @return MessageReply
     */
    public function setBody(string $body): MessageReply
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
     * @return MessageReply
     */
    public function setCategoryId(int $categoryId): MessageReply
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
     * @return MessageReply
     */
    public function setCommentsCount(int $commentsCount = 0): MessageReply
    {
        $this->commentsCount = $commentsCount;
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
     * @return MessageReply
     */
    public function setId(int $id): MessageReply
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMessageId()
    {
        return $this->messageId;
    }

    /**
     * @param int $messageId
     * @return MessageReply
     */
    public function setMessageId(int $messageId): MessageReply
    {
        $this->messageId = $messageId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPostedOn()
    {
        return $this->postedOn;
    }

    /**
     * @param \DateTime $postedOn
     * @return MessageReply
     */
    public function setPostedOn(\DateTime $postedOn): MessageReply
    {
        $this->postedOn = $postedOn;
        return $this;
    }

    /**
     * @return int
     */
    public function getReplyNo()
    {
        return $this->replyNo;
    }

    /**
     * @param int $replyNo
     * @return MessageReply
     */
    public function setReplyNo(int $replyNo): MessageReply
    {
        $this->replyNo = $replyNo;
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
     * @return MessageReply
     */
    public function setTitle(string $title): MessageReply
    {
        $this->title = $title;
        return $this;
    }
}