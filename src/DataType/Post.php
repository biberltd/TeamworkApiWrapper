<?php
/**
 * 2017 (C) Biber Ltd. | http://www.biberltd.com
 *
 * @license     MIT
 * @author      Can Berkol
 * @author      Erman Titiz
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

class Post extends BaseDataType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var int
     */
    private $authorId;

    /**
     * @var bool
     */
    private $useTextile = false;

    /**
     * @var int
     */
    private $milestoneId;

    /**
     * Format: Y-m-d\TH:i:s\Z
     * @var \DateTime
     */
    private $postedOn;

    /**
     * @var int
     */
    private $projectId;

    /**
     * @var int
     */
    private  $commentsCount = 0;

    /**
     * @var int
     */
    private $attachmentsCount = 0;

    /**
     * @var bool
     */
    private $private = false;

    /**
     * @var \stdClass
     */
    private $category = null;

    /**
     * Post constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                            => 'id',
            'title'                         => 'title',
            'body'                          => 'body',
            'categoryId'                    => 'category-id',
            'authorId'                      => 'author-id',
            'useTextiles'                   => 'use-textiles',
            'milestoneId'                   => 'milestoe-id',
            'postedOn'                      => 'poste-on',
            'projectId'                     => 'project-id',
            'completed'                     => 'completed',
            'commentsCount'                 => 'comments-count',
            'attachmentsCount'              => 'attachments-count',
            'private'                       => 'private',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->post)){
            throw new InvalidDataType('post');
        }
        $responseObj = $responseObj->post;
        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(!isset($responseObj->{$propValue}))
            {
               continue;
            }
            switch($propIndex){
                case 'id':
                case 'categoryId':
                case 'authorId':
                case 'milestoneId':
                case 'projectId':
                case 'commentsCount':
                case 'attachmentsCount':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'postedOn':
                    $tmpDate =  \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
            }
            $setFunc = 'set'.ucfirst($propIndex);
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
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
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
     * @return Post
     */
    public function setTitle(string $title): Post
    {
        $this->title = $title;
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
     * @return Post
     */
    public function setBody(string $body): Post
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
     * @return Post
     */
    public function setCategoryId(int $categoryId): Post
    {
        $this->categoryId = $categoryId;
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
     * @return Post
     */
    public function setAuthorId(int $authorId): Post
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return bool
     */
    public function getUseTextile()
    {
        return $this->useTextile;
    }

    /**
     * @return bool
     */
    public function useTextile()
    {
        return $this->useTextile;
    }

    /**
     * @param bool $useTextile
     * @return Post
     */
    public function setUseTextile(bool $useTextile = false): Post
    {
        $this->useTextile = $useTextile;
        return $this;
    }

    /**
     * @return int
     */
    public function getMilestoneId()
    {
        return $this->milestoneId;
    }

    /**
     * @param int $milestoneId
     * @return Post
     */
    public function setMilestoneId(int $milestoneId): Post
    {
        $this->milestoneId = $milestoneId;
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
     * @param \DateTime $postedOn
     * @return Post
     */
    public function setPostedOn(\DateTime $postedOn): Post
    {
        $this->postedOn = $postedOn;
        return $this;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return Post
     */
    public function setProjectId(int $projectId): Post
    {
        $this->projectId = $projectId;
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
     * @return Post
     */
    public function setCommentsCount(int $commentsCount = 0): Post
    {
        $this->commentsCount = $commentsCount;
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
     * @return Post
     */
    public function setAttachmentsCount(int $attachmentsCount = 0): Post
    {
        $this->attachmentsCount = $attachmentsCount;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPrivate()
    {
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
     * @return Post
     */
    public function setPrivate(bool $private = false): Post
    {
        $this->private = $private;
        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param \stdClass $category
     * @return Post
     */
    public function setCategory(\stdClass $category): Post
    {
        $this->category = $category;
        return $this;
    }

}