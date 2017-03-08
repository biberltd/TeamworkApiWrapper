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
     * @var int
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
        if(!isset($responseObj->todoList)){
            throw new InvalidDataType('todoList');
        }

        $todoListDetails = $responseObj->todoList;

        $this->complete = $todoListDetails->complete;
        $this->completedCount = $todoListDetails->{'completed-count'};
        $this->description = $todoListDetails->description;
        $this->id = $todoListDetails->id;
        $this->milestoneId = $todoListDetails->{'milestone-id'};
        $this->name = $todoListDetails->name;
        $this->overdueCount = $todoListDetails->{'overdue-count'};
        $this->pinned = $todoListDetails->pinned;
        $this->position = $todoListDetails->position;
        $this->private = $todoListDetails->private;
        $this->projectId = $todoListDetails->{'project-id'};
        $this->projectName = $todoListDetails->{'project-name'};
        $this->uncompletedCount = $todoListDetails->{'uncompleted-count'};

    }
}