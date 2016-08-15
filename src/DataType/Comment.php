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
    public $commentabşeId;

    /**
     * @var string
     */
    public $commentableType;
    /**
     * @var string
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
    public $private;


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
        if(!isset($responseObj->comment)){
            throw new InvalidDataType('comment');
        }

        $commentDetails = $responseObj->comment;

        $this->attachmentsCount = $commentDetails->{'attachments-count'};
        $this->authorAvatarUrl = $commentDetails->{'author-avatar-url'};
        $this->authorFirstName = $commentDetails->{'author-firstname'};
        $this->authorLastName = $commentDetails->{'author-lastname'};
        $this->authorId = $commentDetails->author_id;
        $this->body = $commentDetails->body;
        $this->commentabşeId = $commentDetails->{'commentable-id'};
        $this->commentableType = $commentDetails->commentable_type;
        $this->dateTime = $commentDetails->datetime;
        $this->emailedFrom = $commentDetails->{'emailed-from'};
        $this->id = $commentDetails->id;
        $this->private = $commentDetails->private;
    }
}