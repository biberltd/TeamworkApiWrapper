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

class Permissions extends BaseDataType
{
    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewMessagesAndFiles = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewTasksAndMilestones = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewTime = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewNotebooks = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewRiskRegister = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewInvoices = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewLinks = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $viewTasks = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addTasks = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addMilestones = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addTaskLists = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addMessages = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addFiles = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addTime = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addNotebooks = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addLinks = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $setPrivacy = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $canBeAssignedToTasksAndMilestones = true;
    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $projectAdministrator = true;

    /**
     * Handled as numeric integer (1,0) in Teamwork.
     * @var bool
     */
    private $addPeopleToProject = true;



    /**
     * Permissions constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'viewMessagesAndFiles'          => 'view-messages-and-files',
            'viewTasksAndMilestones'        => 'view-tasks-and-milestones',
            'viewTime'                      => 'view-time',
            'viewNotebooks'                 => 'view-notebooks',
            'viewRiskRegister'              => 'view-risk-register',
            'viewInvoices'                  => 'view-invoices',
            'viewLinks'                     => 'view-links',
            'addTasks'                      => 'add-tasks',
            'addMilestones'                 => 'add-milestones',
            'addTaskLists'                  => 'add-taskLists',
            'addMessages'                   => 'add-messages',
            'addFiles'                      => 'add-files',
            'addTime'                       => 'add-time',
            'addNotebooks'                  => 'add-notebooks',
            'addLinks'                      => 'add-links',
            'setPrivacy'                    => 'set-privacy',
            'canBeAssignedToTasksAndMilestones' => 'can-be-assigned-to-tasks-and-milestones',
            'addPeopleToProject'            => 'add-people-to-project',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->permissions)){
            throw new InvalidDataType('permissions');
        }
        $responseObj = $responseObj->permissions;
        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(!isset($responseObj->{$propValue}))
            {
               continue;
            }
            switch($propIndex){
                case 'viewMessagesAndFiles':
                case 'viewTasksAndMilestones':
                case 'viewTime':
                case 'viewNotebooks':
                case 'viewRiskRegister':
                case 'viewInvoices':
                case 'viewLinks':
                case 'addTasks':
                case 'addMilestones':
                case 'addTaskLists':
                case 'addMessages':
                case 'addFiles':
                case 'addTime':
                case 'addNotebooks':
                case 'addLinks':
                case 'setPrivacy':
                case 'canBeAssignedToTasksAndMilestones':
                case 'projectAdministrator':
                case 'addPeopleToProject':
                    $responseObj->{$propValue} = $responseObj->{$propValue} == 1 ? true : false;
                    break;
            }
            $setFunc = 'set'.ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getCanViewMessagesAndFiles(bool $forTw = false)
    {
        if($forTw){
            return !$this->viewMessagesAndFiles ? 0 : 1;
        }
        return $this->viewMessagesAndFiles;
    }

    /**
     * @return bool
     */
    public function canViewMessagesAndFiles()
    {
        return $this->viewMessagesAndFiles;
    }

    /**
     * @param bool $viewMessagesAndFiles
     * @return Permissions
     */
    public function setViewMessagesAndFiles(bool $viewMessagesAndFiles = true): Permissions
    {
        $this->viewMessagesAndFiles = $viewMessagesAndFiles;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getViewTasksAndMilestones(bool $forTw = false)
    {
        if($forTw){
            return !$this->viewTasksAndMilestones ? 0 : 1;
        }
        return $this->viewTasksAndMilestones;
    }

    /**
     * @return bool
     */
    public function canViewTasksAndMilestones()
    {
        return $this->viewTasksAndMilestones;
    }

    /**
     * @param bool $viewTasksAndMilestones
     * @return Permissions
     */
    public function setViewTasksAndMilestones(bool $viewTasksAndMilestones = true): Permissions
    {
        $this->viewTasksAndMilestones = $viewTasksAndMilestones;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getViewTime(bool $forTw = false)
    {
        if($forTw){
            return !$this->viewTime ? 0 : 1;
        }
        return $this->viewTime;
    }

    /**
     * @return bool
     */
    public function canViewTime()
    {
        return $this->viewTime;
    }

    /**
     * @param bool $viewTime
     * @return Permissions
     */
    public function setViewTime(bool $viewTime): Permissions
    {
        $this->viewTime = $viewTime;
        return $this;
    }

    public function getViewNotebooks(bool $forTw = false){
        if($forTw){
            return !$this->viewNotebooks ? 0 : 1;
        }
        return $this->viewNotebooks;
    }
    /**
     * @return bool
     */
    public function canViewNotebooks()
    {
        return $this->viewNotebooks;
    }

    /**
     * @param bool $viewNotebooks
     * @return Permissions
     */
    public function setViewNotebooks(bool $viewNotebooks = true): Permissions
    {
        $this->viewNotebooks = $viewNotebooks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getViewRiskRegister(bool $forTw = false)
    {
        if($forTw){
            return !$this->viewRiskRegister ? 0 : 1;
        }
        return $this->viewRiskRegister;
    }

    /**
     * @return bool
     */
    public function canViewRiskRegister()
    {
        return $this->viewRiskRegister;
    }

    /**
     * @param bool $viewRiskRegister
     * @return Permissions
     */
    public function setViewRiskRegister(bool $viewRiskRegister = false): Permissions
    {
        $this->viewRiskRegister = $viewRiskRegister;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool
     */
    public function getViewInvoices($forTw = false)
    {
        if($forTw){
            return !$this->viewInvoices ? 0 : 1;
        }
        return $this->viewInvoices;
    }

    /**
     * @return bool
     */
    public function canViewInvoices()
    {
        return $this->viewInvoices;
    }

    /**
     * @param bool $viewInvoices
     * @return Permissions
     */
    public function setViewInvoices(bool $viewInvoices = true): Permissions
    {
        $this->viewInvoices = $viewInvoices;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getViewLinks(bool $forTw = false)
    {
        if($forTw){
            return !$this->viewLinks ? 0 : 1;
        }
        return $this->viewLinks;
    }

    /**
     * @return bool
     */
    public function canViewLinks()
    {
        return $this->viewLinks;
    }

    /**
     * @param bool $viewLinks
     * @return Permissions
     */
    public function setViewLinks(bool $viewLinks = true): Permissions
    {
        $this->viewLinks = $viewLinks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getViewTasks(bool $forTw = false)
    {
        if($forTw){
            return !$this->viewTasks ? 0 : 1;
        }
        return $this->viewTasks;
    }

    /**
     * @return bool
     */
    public function canViewTasks()
    {
        return $this->viewTasks;
    }

    /**
     * @param bool $viewTasks
     * @return Permissions
     */
    public function setViewTasks(bool $viewTasks = true): Permissions
    {
        $this->viewTasks = $viewTasks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddTasks(bool $forTw = false)
    {
        if($forTw){
            return !$this->addTasks ? 0 : 1;
        }
        return $this->addTasks;
    }

    /**
     * @return bool
     */
    public function canAddTasks()
    {
        return $this->addTasks;
    }

    /**
     * @param bool $addTasks
     * @return Permissions
     */
    public function setAddTasks(bool $addTasks = false): Permissions
    {
        $this->addTasks = $addTasks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddMilestones(bool $forTw = false)
    {
        if($forTw){
            return !$this->addMilestones ? 0 : 1;
        }
        return $this->addMilestones;
    }

    /**
     * @return bool
     */
    public function canAddMilestones()
    {
        return $this->addMilestones;
    }

    /**
     * @param bool $addMilestones
     * @return Permissions
     */
    public function setAddMilestones(bool $addMilestones = true): Permissions
    {
        $this->addMilestones = $addMilestones;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddTaskLists(bool $forTw = false)
    {
        if($forTw){
            return !$this->addTaskLists ? 0 : 1;
        }
        return $this->addTaskLists;
    }

    /**
     * @return bool
     */
    public function canAddTaskLists()
    {
        return $this->addTaskLists;
    }

    /**
     * @param bool $addTaskLists
     * @return Permissions
     */
    public function setAddTaskLists(bool $addTaskLists = true): Permissions
    {
        $this->addTaskLists = $addTaskLists;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddMessages(bool $forTw)
    {
        if($forTw){
            return !$this->addMessages ? 0 : 1;
        }
        return $this->addMessages;
    }
    /**
     * @return bool
     */
    public function canAddMessages()
    {
        return $this->addMessages;
    }

    /**
     * @param bool $addMessages
     * @return Permissions
     */
    public function setAddMessages(bool $addMessages = true): Permissions
    {
        $this->addMessages = $addMessages;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddFiles(bool $forTw = false)
    {
        if($forTw){
            return !$this->addFiles ? 0 : 1;
        }
        return $this->addFiles;
    }

    /**
     * @return bool
     */
    public function canAddFiles()
    {
        return $this->addFiles;
    }

    /**
     * @param bool $addFiles
     * @return Permissions
     */
    public function setAddFiles(bool $addFiles = true): Permissions
    {
        $this->addFiles = $addFiles;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddTime(bool $forTw = false)
    {
        if($forTw){
            return !$this->addTime ? 0 : 1;
        }
        return $this->addTime;
    }

    /**
     * @return bool
     */
    public function canAddTime()
    {
        return $this->addTime;
    }

    /**
     * @param bool $addTime
     * @return Permissions
     */
    public function setAddTime(bool $addTime = true): Permissions
    {
        $this->addTime = $addTime;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddNotebooks(bool $forTw = false)
    {
        if($forTw){
            return !$this->addNotebooks ? 0 : 1;
        }
        return $this->addNotebooks;
    }

    /**
     * @return bool
     */
    public function canAddNotebooks()
    {
        return $this->addNotebooks;
    }

    /**
     * @param bool $addNotebooks
     * @return Permissions
     */
    public function setAddNotebooks(bool $addNotebooks): Permissions
    {
        $this->addNotebooks = $addNotebooks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddLinks(bool $forTw = false)
    {
        if($forTw){
            return !$this->addLinks ? 0 : 1;
        }
        return $this->addLinks;
    }

    /**
     * @return bool
     */
    public function canAddLinks()
    {
        return $this->addLinks;
    }

    /**
     * @param bool $addLinks
     * @return Permissions
     */
    public function setAddLinks(bool $addLinks = true): Permissions
    {
        $this->addLinks = $addLinks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getSetPrivacy(bool $forTw = false)
    {
        if($forTw){
            return !$this->setPrivacy ?  : 1;
        }
        return $this->setPrivacy;
    }

    /**
     * @return bool
     */
    public function canSetPrivacy()
    {
        return $this->setPrivacy;
    }

    /**
     * @param bool $setPrivacy
     * @return Permissions
     */
    public function setSetPrivacy(bool $setPrivacy = true): Permissions
    {
        $this->setPrivacy = $setPrivacy;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getCanBeAssignedToTasksAndMilestones(bool $forTw = false)
    {
        if($forTw){
            return !$this->canBeAssignedToTasksAndMilestones ? 0 : 1;
        }
        return $this->canBeAssignedToTasksAndMilestones;
    }

    /**
     * @return bool
     */
    public function canBeAssignedToTasksAndMilestones()
    {
        return $this->canBeAssignedToTasksAndMilestones;
    }

    /**
     * @param bool $canBeAssignedToTasksAndMilestones
     * @return Permissions
     */
    public function setCanBeAssignedToTasksAndMilestones(bool $canBeAssignedToTasksAndMilestones = true): Permissions
    {
        $this->canBeAssignedToTasksAndMilestones = $canBeAssignedToTasksAndMilestones;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getProjectAdministrator(bool $forTw = false)
    {
        if($forTw){
            return !$this->projectAdministrator ?  : 1;
        }
        return $this->projectAdministrator;
    }

    /**
     * @return bool
     */
    public function isProjectAdministrator()
    {
        return $this->projectAdministrator;
    }

    /**
     * @param bool $projectAdministrator
     * @return Permissions
     */
    public function setProjectAdministrator(bool $projectAdministrator = false): Permissions
    {
        $this->projectAdministrator = $projectAdministrator;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getAddPeopleToProject(bool $forTw = false)
    {
        if($forTw){
            return !$this->addPeopleToProject ?  0 : 1;
        }
        return $this->addPeopleToProject;
    }
    /**
     * @return bool
     */
    public function canAddPeopleToProject()
    {
        return $this->addPeopleToProject;
    }

    /**
     * @param bool $addPeopleToProject
     * @return Permissions
     */
    public function setAddPeopleToProject(bool $addPeopleToProject = false): Permissions
    {
        $this->addPeopleToProject = $addPeopleToProject;
        return $this;
    }

}