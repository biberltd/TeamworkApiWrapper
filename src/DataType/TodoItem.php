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

class TodoItem extends BaseDataType
{

    /**
     * @var bool
     */
    private $canComplete = true;

    /**
     * @var int
     */
    private $projectId;

    /**
     * @var string
     */
    private $creatorLastName;

    /**
     * @var bool
     */
    private $hasReminders = false;

    /**
     * @var string
     */
    private $todoListName;

    /**
     * @var bool
     */
    private $hasUnreadComments;

    /**
     * format: Ymd
     * @var \DateTime
     */
    private $dueDateBase;

    /**
     * @var int
     */
    private  $order;

    /**
     * @var int
     */
    private $commentsCount;

    /**
     * represented as 0 and 1 in TW.
     * @var bool
     */
    private $private = false;

    /**
     * represented as comma delimited in TW.
     * @var array
     */
    private $grantAccessTo;

    /**
     * @var string
     */
    private $status;

    /**
     * @var int
     */
    private $todoListId;

    /**
     * @var array
     */
    private $predecessors = [];

    /**
     * format: "Y-m-d\TH:i:s\Z"
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @var bool
     */
    private $canEdit = true;

    /**
     * @var string
     */
    private $content;

    /**
     * represented as 0 and 1 in TW
     * @var bool
     */
    private $hasPredecessors = false;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $creatorFirstName;

    /**
     * format: "Y-m-d\TH:i:s\Z"
     * @var \DateTime
     */
    private $lastChangedOn;

    /**
     * format: "Ymd"
     * @var \DateTime
     */
    private $dueDate;

    /**
     * Represented as 0, 1 in TW.
     * @var bool
     */
    private $hasDependencies = false;

    /**
     * @var bool
     */
    private $completed = false;

    /**
     * @var int
     */
    private $position;

    /**
     * @var int
     */
    private $attachmentsCount = 0;

    /**
     * @var int
     */
    private $estimatedMinutes = 0;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $priority;

    /**
     * @var int
     */
    private $progress = 0;

    /**
     * @var bool
     */
    private $harvestEnabled = false;

    /**
     * @var bool
     */
    private $viewEstimatedTime = true;

    /**
     * @var int
     */
    private $parentTaskId;

    /**
     * @var int
     */
    private $companyId;

    /**
     * @var int
     */
    private $taskListLockdownId;

    /**
     * @var string
     */
    private $creatorAvatarUrl;

    /**
     * @var bool
     */
    private $canLogTime = true;

    /**
     * @var int
     */
    private $creatorId;

    /**
     * @var string
     */
    private $projectName;

    /**
     * @var \stdClass
     */
    private $parentTask;

    /**
     * @var array
     */
    private $attachments;

    /**
     * represented as comma delimited values in TW.
     * @var array
     */
    private $responsiblePartyIds;


    /**
     * represented as | delimited values in TW.
     * @var array
     */
    private $responsiblePartyNames;

    /**
     * @var string
     */
    private $responsibleParySummary;

    /**
     * format: Ymd
     * @var \DateTime
     */
    private $startDate;

    /**
     * Represented as 0, 1 in TW.
     * @var bool
     */
    private $taskListPrivate;

    /**
     * Represented as 0,1 in TW.
     * @var bool
     */
    private $timeIsLogged;

    /**
     * @var int
     */
    private $lockdownId;

    /**
     * @var array
     * of \stdClass
     */
    private $tags;

    /**
     * TodoItem constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'canComplete'               => 'canComplete',
            'projectId'                 => 'project-id',
            'creatorLastName'           => 'creator-lastname',
            'hasReminders'              => 'has-reminders',
            'todoListName'              => 'todo-list-name',
            'hasUnreadComments'         => 'has-unread-comments',
            'dueDateBase'               => 'due-date-base',
            'order'                     => 'order',
            'private'                   => 'private',
            'status'                    => 'status',
            'todoListId'                => 'todo-list-id',
            'predecessors'              => 'predecessors',
            'createdOn'                 => 'created-on',
            'canEdit'                   => 'canEdit',
            'content'                   => 'content',
            'has-predecessors'          => 'hasPredecessors',
            'companyName'               => 'companyName',
            'id'                        => 'id',
            'creatorFirstName'          => 'creator-firstname',
            'lastChangedOn'             => 'last-changed-on',
            'dueDate'                   => 'due-date',
            'hasDependencies'           => 'has-dependencies',
            'completed'                 => 'completed',
            'position'                  => 'position',
            'grantAccessTo'             => 'grant-access-to',
            'attachmentsCount'          => 'attachments-count',
            'estimatedMinutes'          => 'estimated-minutes',
            'description'               => 'description',
            'priority'                  => 'priority',
            'progress'                  => 'progress',
            'harvestEnabled'            => 'harvest-enabled',
            'viewEstimatedTime'         => 'viewEstimatedTime',
            'parentTaskId'              => 'parentTaskId',
            'companyId'                 => 'company-id',
            'tasklistLockdownId'        => 'tasklist-lockdownId',
            'creatorAvatarUrl'          => 'creator-avatar-url',
            'canLogTime'                => 'canLogTime',
            'creatorId'                 => 'creator-id',
            'projectName'               => 'project-name',
            'parentTask'                => 'parent-task',
            'attachments'               => 'attachments',
            'responsiblePartyIds'       => 'responsible-party-ids',
            'responsiblePartyNames'     => 'responsible-party-names',
            'responsiblePartySummary'   => 'responsible-party-summary',
            'startDate'                 => 'start-date',
            'tasklistPrivate'           => 'tasklist-private',
            'timeIsLogged'              => 'timeIsLogged',
            'lockdownId'                => 'lockdownId',
            'tags'                      => 'tags',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'todo-item'})) {
            throw new InvalidDataType('todo-item');
        }
        $responseObj = $responseObj->{'todo-item'};

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'projectId':
                case 'order':
                case 'todoListId':
                case 'id':
                case 'position':
                case 'progress':
                case 'progressparentTaskId':
                case 'companyId':
                case 'commentsCount':
                case 'attachmentsCount':
                case 'creatorId':
                case 'estimatedMinutes':
                case 'lockdownId':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'createdOn':
                case 'lastChangedOn':
                    $tmpDate = \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'dueDateBase':
                case 'startDate':
                    $tmpDate = \DateTime::createFromFormat('Ymd', $responseObj->{$propValue});
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'grantAccessTo':
                case 'responsiblePartyIds':
                    $tmpCollection = explode(',', $responseObj->{$propValue});
                    for($i = 0; $i < count($tmpCollection); $i++){
                        $tmpCollection[$i] = (int) $tmpCollection[$i];
                    }
                    $responseObj->{$propValue} = $tmpCollection;
                    break;
                case 'responsiblePartyNames':
                    $tmpCollection = explode('|', $responseObj->{$propValue});
                    for($i = 0; $i < count($tmpCollection); $i++){
                        $tmpCollection[$i] = (int) $tmpCollection[$i];
                    }
                    $responseObj->{$propValue} = $tmpCollection;
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
     * @return bool
     */
    public function getCanComplete(){
        return $this->canComplete;
    }
    /**
     * @return bool
     */
    public function canComplete()
    {
        return $this->canComplete;
    }

    /**
     * @param bool $canComplete
     * @return TodoItem
     */
    public function setCanComplete(bool $canComplete): TodoItem
    {
        $this->canComplete = $canComplete;
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
     * @return TodoItem
     */
    public function setProjectId(int $projectId): TodoItem
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorLastName()
    {
        return $this->creatorLastName;
    }

    /**
     * @param string $creatorLastName
     * @return TodoItem
     */
    public function setCreatorLastName(string $creatorLastName): TodoItem
    {
        $this->creatorLastName = $creatorLastName;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasReminders(){
        return $this->hasReminders;
    }

    /**
     * @return bool
     */
    public function hasReminders()
    {
        return $this->hasReminders;
    }

    /**
     * @param bool $hasReminders
     * @return TodoItem
     */
    public function setHasReminders(bool $hasReminders = false): TodoItem
    {
        $this->hasReminders = $hasReminders;
        return $this;
    }

    /**
     * @return string
     */
    public function getTodoListName()
    {
        return $this->todoListName;
    }

    /**
     * @param string $todoListName
     * @return TodoItem
     */
    public function setTodoListName(string $todoListName): TodoItem
    {
        $this->todoListName = $todoListName;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasUnreadCommentS(){
        return $this->hasUnreadComments;
    }

    /**
     * @return bool
     */
    public function hasUnreadComments()
    {
        return $this->hasUnreadComments;
    }

    /**
     * @param bool $hasUnreadComments
     * @return TodoItem
     */
    public function setHasUnreadComments(bool $hasUnreadComments = false): TodoItem
    {
        $this->hasUnreadComments = $hasUnreadComments;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getDueDateBase(bool $forTw = false)
    {
        if(!$forTw){
            return $this->dueDateBase;
        }
        return $this->dueDateBase->format('Ymd');
    }

    /**
     * @param \DateTime $dueDateBase
     * @return TodoItem
     */
    public function setDueDateBase(\DateTime $dueDateBase): TodoItem
    {
        $this->dueDateBase = $dueDateBase;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     * @return TodoItem
     */
    public function setOrder(int $order): TodoItem
    {
        $this->order = $order;
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
     * @return TodoItem
     */
    public function setCommentsCount(int $commentsCount = 0): TodoItem
    {
        $this->commentsCount = $commentsCount;
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
     * @return TodoItem
     */
    public function setPrivate(bool $private): TodoItem
    {
        $this->private = $private;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return array|string
     */
    public function getGrantAccessTo(bool $forTw = false)
    {
        if(!$forTw){
            return $this->grantAccessTo;
        }
        return implode(',', $this->grantAccessTo);
    }

    /**
     * @param array $grantAccessTo
     * @return TodoItem
     */
    public function setGrantAccessTo(array $grantAccessTo): TodoItem
    {
        $this->grantAccessTo = $grantAccessTo;
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
     * @return TodoItem
     */
    public function setStatus(string $status): TodoItem
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getTodoListId()
    {
        return $this->todoListId;
    }

    /**
     * @param int $todoListId
     * @return TodoItem
     */
    public function setTodoListId(int $todoListId): TodoItem
    {
        $this->todoListId = $todoListId;
        return $this;
    }

    /**
     * @return array
     */
    public function getPredecessors()
    {
        return $this->predecessors;
    }

    /**
     * @param array $predecessors
     * @return TodoItem
     */
    public function setPredecessors(array $predecessors): TodoItem
    {
        $this->predecessors = $predecessors;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getCreatedOn(bool $forTw = false)
    {
        if(!$forTw){
            return $this->createdOn;
        }
        return $this->createdOn->format('Y-m-d|TH:i:s\Z');
    }

    /**
     * @param \DateTime $createdOn
     * @return TodoItem
     */
    public function setCreatedOn(\DateTime $createdOn): TodoItem
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanEdit(){
        return $this->canEdit;
    }
    /**
     * @return bool
     */
    public function canEdit()
    {
        return $this->canEdit;
    }

    /**
     * @param bool $canEdit
     * @return TodoItem
     */
    public function setCanEdit(bool $canEdit = true): TodoItem
    {
        $this->canEdit = $canEdit;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return TodoItem
     */
    public function setContent(string $content = ''): TodoItem
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getHasPredecessors(bool $forTw = false){
        if(!$forTw){
            return $this->hasPredecessors;
        }
        return !$this->hasPredecessors ? 0 : 1;
    }
    /**
     * @return bool
     */
    public function hasPredecessors()
    {
        return $this->hasPredecessors;
    }

    /**
     * @param bool $hasPredecessors
     * @return TodoItem
     */
    public function setHasPredecessors(bool $hasPredecessors = false): TodoItem
    {
        $this->hasPredecessors = $hasPredecessors;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param string $companyName
     * @return TodoItem
     */
    public function setCompanyName(string $companyName): TodoItem
    {
        $this->companyName = $companyName;
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
     * @return TodoItem
     */
    public function setId(int $id): TodoItem
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorFirstName()
    {
        return $this->creatorFirstName;
    }

    /**
     * @param string $creatorFirstName
     * @return TodoItem
     */
    public function setCreatorFirstName(string $creatorFirstName): TodoItem
    {
        $this->creatorFirstName = $creatorFirstName;
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
        return $this->lastChangedOn->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $lastChangedOn
     * @return TodoItem
     */
    public function setLastChangedOn(\DateTime $lastChangedOn): TodoItem
    {
        $this->lastChangedOn = $lastChangedOn;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->dueDate;
        }
        return $this->dueDate->format('Ymd');
    }

    /**
     * @param \DateTime $dueDate
     * @return TodoItem
     */
    public function setDueDate(\DateTime $dueDate): TodoItem
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getHasDependencies(bool $forTw = false){
        if($forTw){
            return !$this->hasDependencies ? 0 : 1;
        }
        return $this->hasDependencies;
    }
    /**
     * @return bool
     */
    public function hasDependencies()
    {
        return $this->hasDependencies;
    }

    /**
     * @param bool $hasDependencies
     * @return TodoItem
     */
    public function setHasDependencies(bool $hasDependencies = false): TodoItem
    {
        $this->hasDependencies = $hasDependencies;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCompleted(){
        return $this->completed;
    }
    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->completed;
    }

    /**
     * @param bool $completed
     * @return TodoItem
     */
    public function setCompleted(bool $completed = false): TodoItem
    {
        $this->completed = $completed;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     * @return TodoItem
     */
    public function setPosition(int $position): TodoItem
    {
        $this->position = $position;
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
     * @return TodoItem
     */
    public function setAttachmentsCount(int $attachmentsCount): TodoItem
    {
        $this->attachmentsCount = $attachmentsCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getEstimatedMinutes()
    {
        return $this->estimatedMinutes;
    }

    /**
     * @param int $estimatedMinutes
     * @return TodoItem
     */
    public function setEstimatedMinutes(int $estimatedMinutes = 0): TodoItem
    {
        $this->estimatedMinutes = $estimatedMinutes;
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
     * @return TodoItem
     */
    public function setDescription(string $description): TodoItem
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $priority
     * @return TodoItem
     */
    public function setPriority(string $priority): TodoItem
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * @return int
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * @param int $progress
     * @return TodoItem
     */
    public function setProgress(int $progress = 0): TodoItem
    {
        $this->progress = $progress;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHarvestEnabled(){
        return $this->harvestEnabled;
    }

    /**
     * @return bool
     */
    public function isHarvestEnabled()
    {
        return $this->harvestEnabled;
    }

    /**
     * @param bool $harvestEnabled
     * @return TodoItem
     */
    public function setHarvestEnabled(bool $harvestEnabled = false): TodoItem
    {
        $this->harvestEnabled = $harvestEnabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function getViewEstimatedTime(){
        return $this->viewEstimatedTime;
    }
    /**
     * @return bool
     */
    public function viewEstimatedTime()
    {
        return $this->viewEstimatedTime;
    }

    /**
     * @param bool $viewEstimatedTime
     * @return TodoItem
     */
    public function setViewEstimatedTime(bool $viewEstimatedTime = true): TodoItem
    {
        $this->viewEstimatedTime = $viewEstimatedTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getParentTaskId()
    {
        return $this->parentTaskId;
    }

    /**
     * @param int $parentTaskId
     * @return TodoItem
     */
    public function setParentTaskId(int $parentTaskId): TodoItem
    {
        $this->parentTaskId = $parentTaskId;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     * @return TodoItem
     */
    public function setCompanyId(int $companyId): TodoItem
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTaskListLockdownId()
    {
        return $this->tasklistLockdownId;
    }

    /**
     * @param int $tasklistLockdownId
     * @return TodoItem
     */
    public function setTaskListLockdownId(int $tasklistLockdownId): TodoItem
    {
        $this->taskListLockdownId = $tasklistLockdownId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatorAvatarUrl()
    {
        return $this->creatorAvatarUrl;
    }

    /**
     * @param string $creatorAvatarUrl
     * @return TodoItem
     */
    public function setCreatorAvatarUrl(string $creatorAvatarUrl = ''): TodoItem
    {
        $this->creatorAvatarUrl = $creatorAvatarUrl;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanLogTime(){
        return $this->canLogTime;
    }
    /**
     * @return bool
     */
    public function canLogTime()
    {
        return $this->canLogTime;
    }

    /**
     * @param bool $canLogTime
     * @return TodoItem
     */
    public function setCanLogTime(bool $canLogTime = true): TodoItem
    {
        $this->canLogTime = $canLogTime;
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
     * @return TodoItem
     */
    public function setCreatorId(int $creatorId): TodoItem
    {
        $this->creatorId = $creatorId;
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
     * @return TodoItem
     */
    public function setProjectName(string $projectName): TodoItem
    {
        $this->projectName = $projectName;
        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getParentTask()
    {
        return $this->parentTask;
    }

    /**
     * @param \stdClass $parentTask
     * @return TodoItem
     */
    public function setParentTask(\stdClass $parentTask): TodoItem
    {
        $this->parentTask = $parentTask;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param array $attachments
     * @return TodoItem
     */
    public function setAttachments(array $attachments): TodoItem
    {
        $this->attachments = $attachments;
        return $this;
    }

    public function getResponsiblePartyIds(bool $forTw = false)
    {
        if(!$forTw){
            return $this->responsiblePartyIds;
        }
        return implode(',', $this->responsiblePartyIds);
    }

    /**
     * @param array $responsiblePartyIds
     * @return TodoItem
     */
    public function setResponsiblePartyIds(array $responsiblePartyIds): TodoItem
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
        return implode('|', $this->responsiblePartyNames);
    }

    /**
     * @param array $responsiblePartyNames
     * @return TodoItem
     */
    public function setResponsiblePartyNames(array $responsiblePartyNames): TodoItem
    {
        $this->responsiblePartyNames = $responsiblePartyNames;
        return $this;
    }

    /**
     * @return string
     */
    public function getResponsibleParySummary()
    {
        return $this->responsibleParySummary;
    }

    /**
     * @param string $responsibleParySummary
     * @return TodoItem
     */
    public function setResponsibleParySummary(string $responsibleParySummary): TodoItem
    {
        $this->responsibleParySummary = $responsibleParySummary;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(bool $forTw = false)
    {
        if($forTw){
            return $this->startDate;
        }
        return $this->startDate->format('Ymd');
    }

    /**
     * @param \DateTime $startDate
     * @return TodoItem
     */
    public function setStartDate(\DateTime $startDate): TodoItem
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getTaskListPrivate(bool $forTw = false){
        if(!$forTw){
            return $this->taskListPrivate;
        }
        return !$this->taskListPrivate ? 0 : 1;
    }
    /**
     * @return bool
     */
    public function isTasklistPrivate()
    {
        return $this->taskListPrivate;
    }

    /**
     * @param bool $tasklistPrivate
     * @return TodoItem
     */
    public function setTasklistPrivate(bool $tasklistPrivate): TodoItem
    {
        $this->taskListPrivate = $tasklistPrivate;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getTimeIsLogged(bool $forTw = false){
        if(!$forTw){
            return $this->timeIsLogged;
        }
        return !$this->timeIsLogged ? 0 : 1;
    }
    /**
     * @return bool
     */
    public function isTimeLogged()
    {
        return $this->timeIsLogged;
    }

    /**
     * @param bool $timeIsLogged
     * @return TodoItem
     */
    public function setTimeIsLogged(bool $timeIsLogged): TodoItem
    {
        $this->timeIsLogged = $timeIsLogged;
        return $this;
    }

    /**
     * @return int
     */
    public function getLockdownId()
    {
        return $this->lockdownId;
    }

    /**
     * @param int $lockdownId
     * @return TodoItem
     */
    public function setLockdownId(int $lockdownId): TodoItem
    {
        $this->lockdownId = $lockdownId;
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
     * @return TodoItem
     */
    public function setTags(array $tags): TodoItem
    {
        $this->tags = $tags;
        return $this;
    }

}