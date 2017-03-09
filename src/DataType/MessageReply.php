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
     * @var string
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
        $this->attachmentsCount = $responseObj->{'attachments-count'};
        $this->authorAvatarUrl = $responseObj->{'author-avatar-url'};
        $this->authorFirstName = $responseObj->{'author-firstname'};
        $this->authorId = $responseObj->{'author-id'};
        $this->authorLastName= $responseObj->{'author-lastname'};
        $this->body = $responseObj->body;
        $this->categoryId = $responseObj->{'category-id'};
        $this->commentsCount = $responseObj->{'comments-count'};
        $this->id = $responseObj->id;
        $this->messageId = $responseObj->messageId;
        $this->postedOn = $responseObj->{'posted-on'};
        $this->replyNo = $responseObj->replyNo;
        $this->title = $responseObj->title;
        $this->setPrivate(isset($responseObj->private) ? $responseObj->private : null);
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
    public function isPrivate(){
        return $this->private;
    }
}