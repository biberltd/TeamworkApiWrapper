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
 * @see http://developer.teamwork.com/datareference#todoList
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class TodoList extends BaseDataType
{

    /**
     * @var bool
     */
    public $complete;

    /**
     * @var int
     */
    public $completedCount;

    /**
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $milestoneId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $overdueCount;

    /**
     * @var bool
     */
    public $pinned;

    /**
     * @var int
     */
    public $position;

    /**
     * Tw handles this as a numeric string.
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
    public $projectName;

    /**
     * @var int
     */
    public $uncompletedCount;


    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'complete'            => 'complete',
            'completedCount'      => 'completed-count',
            'description'         => 'description',
            'id'                  => 'id',
            'milestoneId'         => 'milestone-id',
            'name'                => 'name',
            'overdueCount'        => 'overdue-count',
            'pinned'              => 'pinned',
            'position'            => 'position',
            'private'             => 'private',
            'projectId'           => 'project-id',
            'projectName'         => 'project-name',
            'uncompletedCount'    => 'uncompleted-count',
        ];
        parent::convertFromResponseObj($responseObj);
    }


    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'todo-list'})) {
            throw new InvalidDataType('todo-list');
        }
        $responseObj = $responseObj->person;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'id':
                case 'milestonId':
                case 'uncompletedCount':
                case 'overdueCount':
                case 'projectId':
                case 'posision':
                case 'completedCount':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'private':
                    $responseObj->{$propValue} = $responseObj->{$propValue} === 0 ? false : true;
                    break;
            }
            $setFunc = 'set' . ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    /**
     * @return bool
     */
    public function getComplete()
    {
        return $this->complete;
    }

    /**
     * @return bool
     */
    public function isCompleted()
    {
        return $this->getComplete();
    }

    /**
     * @param bool $complete
     * @return TodoList
     */
    public function setComplete(bool $complete): TodoList
    {
        $this->complete = $complete;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompletedCount()
    {
        return $this->completedCount;
    }

    /**
     * @param int $completedCount
     * @return TodoList
     */
    public function setCompletedCount(int $completedCount): TodoList
    {
        $this->completedCount = $completedCount;
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
     * @return TodoList
     */
    public function setDescription(string $description): TodoList
    {
        $this->description = $description;
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
     * @return TodoList
     */
    public function setId(int $id): TodoList
    {
        $this->id = $id;
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
     * @return TodoList
     */
    public function setMilestoneId(int $milestoneId): TodoList
    {
        $this->milestoneId = $milestoneId;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TodoList
     */
    public function setName(string $name): TodoList
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getOverdueCount()
    {
        return $this->overdueCount;
    }

    /**
     * @param int $overdueCount
     * @return TodoList
     */
    public function setOverdueCount(int $overdueCount): TodoList
    {
        $this->overdueCount = $overdueCount;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPinned()
    {
        return $this->pinned;
    }

    /**
     * @return bool
     */
    public function isPinned()
    {
        return $this->getPinned();
    }

    /**
     * @param bool $pinned
     * @return TodoList
     */
    public function setPinned(bool $pinned): TodoList
    {
        $this->pinned = $pinned;
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
     * @return TodoList
     */
    public function setPosition(int $position): TodoList
    {
        $this->position = $position;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getPrivate(bool $forTw = false)
    {
        if($forTw){
            return !$this->private ? 0 : 1;
        }
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
     * @return TodoList
     */
    public function setPrivate(bool $private): TodoList
    {
        $this->private = $private;
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
     * @return TodoList
     */
    public function setProjectId(int $projectId): TodoList
    {
        $this->projectId = $projectId;
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
     * @return TodoList
     */
    public function setProjectName(string $projectName): TodoList
    {
        $this->projectName = $projectName;
        return $this;
    }

    /**
     * @return int
     */
    public function getUncompletedCount()
    {
        return $this->uncompletedCount;
    }

    /**
     * @param int $uncompletedCount
     * @return TodoList
     */
    public function setUncompletedCount(int $uncompletedCount): TodoList
    {
        $this->uncompletedCount = $uncompletedCount;
        return $this;
    }
}