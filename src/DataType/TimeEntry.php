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

class TimeEntry extends BaseDataType
{

    /**
     * @var int
     */
    private $projectId;

    /**
     * @var int
     */
    private $minutes;

    /**
     * @var bool
     */
    private $isBillable = false;

    /**
     * @var string
     */
    private $personFirstName;

    /**
     * @var string
     */
    private $todoListName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $todoItemName;

    /**
     * @var int
     */
    private $todoListId;

    /**
     * @var array
     * of \stdClass
     */
    private $tags;

    /**
     * @var int
     */
    private $companyId;

    /**
     * @var int
     */
    private $personId;

    /**
     * @var string
     */
    private $projectName;

    /**
     * @var string
     */
    private $companyName;

    /**
     * @var int
     */
    private $id;

    /**
     * format "Y-m-d\T:H:i:s\Z"
     * @var \DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $todoItemId;

    /**
     * @var string
     */
    private $invoiceNo;

    /**
     * @var string
     */
    private $personLastName;

    /**
     * @var bool
     */
    private $hasStartTime;

    /**
     * @var int
     */
    private $hours;

    /**
     * Comment constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                        => 'id',
            'projectId'                 => 'project-id',
            'minutes'                   => 'minutes',
            'description'               => 'descripiton',
            'isBillable'                => 'isbillable',
            'personFirstName'           => 'person-first-name',
            'todoListName'              => 'todo-list-name',
            'todo-item-name'            => 'todo-item-name',
            'todoListId'                => 'todo-list-id',
            'tags'                      => 'tags',
            'companyId'                 => 'company-id',
            'personId'                  => 'person-id',
            'companyName'               => 'company-name',
            'date'                      => 'date',
            'todoItemId'                => 'todo-item-id',
            'invoiceNo'                 => 'invoiceNo',
            'personLastName'            => 'person-last-name',
            'hastStartTime'             => 'has-start-time',
            'hours'                     => 'hours',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'time-entry'})) {
            throw new InvalidDataType('time-entry');
        }
        $responseObj = $responseObj->{'time-entry'};

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'projectId':
                case 'id':
                case 'minutes':
                case 'todoListId':
                case 'companyId':
                case 'personId':
                case 'id':
                case 'todoItemId':
                case 'hours':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'date':
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
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * @param int $projectId
     * @return TimeEntry
     */
    public function setProjectId(int $projectId): TimeEntry
    {
        $this->projectId = $projectId;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param int $minutes
     * @return TimeEntry
     */
    public function setMinutes(int $minutes): TimeEntry
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * @return bool
     */
    public function isIsBillable()
    {
        return $this->isBillable;
    }

    /**
     * @param bool $isBillable
     * @return TimeEntry
     */
    public function setIsBillable(bool $isBillable = false): TimeEntry
    {
        $this->isBillable = $isBillable;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonFirstName()
    {
        return $this->personFirstName;
    }

    /**
     * @param string $personFirstName
     * @return TimeEntry
     */
    public function setPersonFirstName(string $personFirstName): TimeEntry
    {
        $this->personFirstName = $personFirstName;
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
     * @return TimeEntry
     */
    public function setTodoListName(string $todoListName): TimeEntry
    {
        $this->todoListName = $todoListName;
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
     * @return TimeEntry
     */
    public function setDescription(string $description): TimeEntry
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getTodoItemName()
    {
        return $this->todoItemName;
    }

    /**
     * @param string $todoItemName
     * @return TimeEntry
     */
    public function setTodoItemName(string $todoItemName): TimeEntry
    {
        $this->todoItemName = $todoItemName;
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
     * @return TimeEntry
     */
    public function setTodoListId(int $todoListId): TimeEntry
    {
        $this->todoListId = $todoListId;
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
     * @return TimeEntry
     */
    public function setTags(array $tags): TimeEntry
    {
        $this->tags = $tags;
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
     * @return TimeEntry
     */
    public function setCompanyId(int $companyId): TimeEntry
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPersonId()
    {
        return $this->personId;
    }

    /**
     * @param int $personId
     * @return TimeEntry
     */
    public function setPersonId(int $personId): TimeEntry
    {
        $this->personId = $personId;
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
     * @return TimeEntry
     */
    public function setProjectName(string $projectName): TimeEntry
    {
        $this->projectName = $projectName;
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
     * @return TimeEntry
     */
    public function setCompanyName(string $companyName): TimeEntry
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
     * @return TimeEntry
     */
    public function setId(int $id): TimeEntry
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->date;
        }
        return $this->date->format('Y-m-s\TH:i:s\Z');
    }

    /**
     * @param \DateTime $date
     * @return TimeEntry
     */
    public function setDate(\DateTime $date): TimeEntry
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getTodoItemId()
    {
        return $this->todoItemId;
    }

    /**
     * @param int $todoItemId
     * @return TimeEntry
     */
    public function setTodoItemId(int $todoItemId): TimeEntry
    {
        $this->todoItemId = $todoItemId;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    /**
     * @param string $invoiceNo
     * @return TimeEntry
     */
    public function setInvoiceNo(string $invoiceNo): TimeEntry
    {
        $this->invoiceNo = $invoiceNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getPersonLastName()
    {
        return $this->personLastName;
    }

    /**
     * @param string $personLastName
     * @return TimeEntry
     */
    public function setPersonLastName(string $personLastName): TimeEntry
    {
        $this->personLastName = $personLastName;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasStartTime(){
        return $this->hasStartTime;
    }
    /**
     * @return bool
     */
    public function hasStartTime()
    {
        return $this->hasStartTime;
    }

    /**
     * @param bool $hasStartTime
     * @return TimeEntry
     */
    public function setHasStartTime(bool $hasStartTime): TimeEntry
    {
        $this->hasStartTime = $hasStartTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param int $hours
     * @return TimeEntry
     */
    public function setHours(int $hours): TimeEntry
    {
        $this->hours = $hours;
        return $this;
    }

}