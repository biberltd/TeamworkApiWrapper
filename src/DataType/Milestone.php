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

class Milestone extends BaseDataType
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
     * @var int
     */
    private $projectId;

    /**
     * Format: Y-m-dH:i:sZ
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @var int
     */
    private $creatorId;

    /**
     * @var int
     */
    private $commentsCount = 0;

    /**
     * Format: Y-m-dH:i:sZ
     * @var \DateTime
     */
    private $completedOn;

    /**
     * Format: Ymd
     * @var \DateTime
     */
    private $deadline;

    /**
     * @var bool
     */
    private $completed = false;

    /**
     * @var int
     */
    private  $completerId;

    /**
     * Comma-seperated
     * @var array <integer>
     */
    private $responsiblePartyIds = [];

    /**
     * Comma-seperated
     * @var array <string>
     */
    private $responsiblePartyNames = [];

    /**
     * @var bool
     */
    private $reminder = false;

    /**
     * @var bool
     */
    private $private = false;

    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                            => 'id',
            'title'                         => 'title',
            'projectId'                     => 'project-id',
            'createdOn'                     => 'created-on',
            'creatorId'                     => 'creator-id',
            'commentsCount'                 => 'comments-count',
            'private'                       => 'private',
            'completedOn'                   => 'completed-on',
            'deadline'                      => 'deadline',
            'completed'                     => 'completed',
            'completerId'                   => 'completer-id',
            'responsiblePartyIds'           => 'responsible-party-ids',
            'responsiblePartyNames'         => 'responsible-party-names',
            'reminder'                      => 'reminder',
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
        if(!isset($responseObj->milestone)){
            throw new InvalidDataType('milestone');
        }
        $responseObj = $responseObj->milestone;
        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(!isset($responseObj->{$propValue}))
            {
               continue;
            }
            switch($propIndex){
                case 'id':
                case 'projectId':
                case 'creatorId':
                case 'commentsCount':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'responsiblePartyIds':
                    $tmpCollection = explode(',', $responseObj->{$propValue});
                    for($i = 0; $i < count($tmpCollection); $i++){
                        $tmpCollection[$i] = (int) $tmpCollection[$i];
                    }
                    $responseObj->{$propValue} = $tmpCollection;
                    break;
                case 'responsiblePartyNames':
                    $tmpCollection = explode(',', $responseObj->{$propValue});
                    $responseObj->{$propValue} = $tmpCollection;
                    unset($tmpCollection);
                    break;
                case 'createdOn':
                case 'completedOn':
                    $tmpDate =  \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'deadline':
                    $tmpDate =  \DateTime::createFromFormat('Ymd', $responseObj->{$propValue});
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
     * @return $this
     */
    public function setId(int $id)
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
     * @return $this
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
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

    /**
     * @param bool $forTw
     * @return \DateTime
     */
    public function getCreatedOn(bool $forTw = false)
    {
        if(!$forTw){
            return $this->createdOn;
        }
        return $this->createdOn->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $createdOn
     * @return $this
     */
    public function setCreatedOn(\DateTime $createdOn)
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatorId()
    {
        return $this->creatorId;
    }

    /**
     * @param int $creatorId
     * @return $this
     */
    public function setCreatorId(int $creatorId)
    {
        $this->creatorId = $creatorId;
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
     * @return $this
     */
    public function setCommentsCount(int $commentsCount = 0)
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getCompletedOn(bool $forTw = false)
    {
        if(!$forTw){
            return $this->completedOn;
        }
        return $this->completedOn->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $completedOn
     * @return $this
     */
    public function setCompletedOn(\DateTime $completedOn)
    {
        $this->completedOn = $completedOn;
        return $this;
    }

    public function getDeadline(bool $forTw = false)
    {
        if(!$forTw){
            return $this->deadline;
        }
        return $this->deadline->format('Ymd');
    }

    /**
     * @param \DateTime $deadline
     * @return $this
     */
    public function setDeadline(\DateTime $deadline)
    {
        $this->deadline = $deadline;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->getCompleted();
    }

    /**
     * @param bool $completed
     * @return $this
     */
    public function setCompleted(bool $completed = false)
    {
        $this->completed = $completed;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompleterId()
    {
        return $this->completerId;
    }

    /**
     * @param int $completerId
     * @return $this
     */
    public function setCompleterId(int $completerId)
    {
        $this->completerId = $completerId;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return array|string
     */
    public function getResponsiblePartyIds(bool $forTw = false)
    {
        if(!$forTw){
            return $this->responsiblePartyIds;
        }
        return implode(',', $this->responsiblePartyIds);
    }

    /**
     * @param array $responsiblePartyIds
     * @return $this
     */
    public function setResponsiblePartyIds(array $responsiblePartyIds = [])
    {
        $this->responsiblePartyIds = $responsiblePartyIds;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return array|string
     */
    public function getResponsiblePartyNames(bool $forTw = false)
    {
        if(!$forTw){
            return $this->responsiblePartyNames;
        }
        return implode(',', $this->responsiblePartyNames);
    }

    /**
     * @param array $responsiblePartyNames
     * @return $this
     */
    public function setResponsiblePartyNames(array $responsiblePartyNames = [])
    {
        $this->responsiblePartyNames = $responsiblePartyNames;
        return $this;
    }

    /**
     * @return bool
     */
    public function getReminder()
    {
        return $this->reminder;
    }

    /**
     * @return bool
     */
    public function isReminderSet()
    {
        return $this->getReminder();
    }

    /**
     * @param bool $reminder
     * @return $this
     */
    public function setReminder(bool $reminder = false)
    {
        $this->reminder = $reminder;
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
}