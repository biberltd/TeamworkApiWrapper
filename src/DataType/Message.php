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
     * @var string
     */
    public $postedOn;

    /**
     * @var bool
     */
    public $private;

    /**
     * @var int
     */
    public $projectId;

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
        if(!isset($responseObj->message)){
            throw new InvalidDataType('message');
        }

        $postDetails = $responseObj->post;

        $this->attachmentsCount = $postDetails->{'attachments-count'};
        $this->authorAvatarUrl = $postDetails->{'author-avatar-url'};
        $this->authorFirstName = $postDetails->{'author-first-name'};
        $this->authorId = $postDetails->authorId;
        $this->authorLastName = $postDetails->{'author-last-name'};
        $this->body = $postDetails->body;
        $this->displayBody = $postDetails->{'display-body'};
        $this->categoryId = $postDetails->{'category-id'};
        $this->commentsCount = $postDetails->{'comments-count'};
        $this->id = $postDetails->id;
        $this->postedOn = $postDetails->{'posted-on'};
        $this->private = $postDetails->{'private'};
        $this->projectId = $postDetails->{'project-id'};
        $this->title = $postDetails->title;

    }
}