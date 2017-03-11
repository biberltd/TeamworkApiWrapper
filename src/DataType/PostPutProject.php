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
 * @see http://developer.teamwork.com/datareference#milestone
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class PostPutProject extends BaseDataType
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $companyId;

    /**
     * @var string
     */
    private $newCompany = null;

    /**
     * @var \stdClass
     */
    private $company;

    /**
     * @var int
     */
    private $categoryId;

    /**
     * @var \DateTime
     */
    private $startDate;

    /**
     * @var \DateTime
     */
    private $endDate;

    /**
     * @var bool
     */
    private $useTasks = true;

    /**
     * @var bool
     */
    private $useMilestones = true;

    /**
     * @var bool
     */
    private $useMessages = true;

    /**
     * @var bool
     */
    private $useFiles = true;

    /**
     * @var bool
     */
    private $useTime = true;

    /**
     * @var bool
     */
    private $useNotebook = true;

    /**
     * @var bool
     */
    private $useRiskRegister = true;

    /**
     * @var bool
     */
    private $useLinks = true;

    /**
     * @var bool
     */
    private $useBilling = true;

    /**
     * @var string
     */
    private $startPage = 'projectoverview';

    /**
     * @var bool
     */
    private $harvestTimersEnabled;

    /**
     * @var string
     */
    private $defaultPrivacy = 'open';

    /**
     * Project constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'description'                   => 'description',
            'name'                          => 'name',
            'companyId'                     => 'companyId',
            'newCompany'                    => 'newCompany',
            'categoryId'                    => 'category-id',
            'startDate'                     => 'start-date',
            'endDate'                       => 'end-date',
            'useTasks'                      => 'use-tasks',
            'useMilestones'                 => 'use-milestones',
            'useMessages'                   => 'use-messages',
            'useFiles'                      => 'use-files',
            'useTime'                       => 'use-time',
            'useNotebook'                   => 'use-notebook',
            'useRiskRegister'               => 'use-riskregister',
            'useBilling'                    => 'use-billing',
            'useLinks'                      => 'use-links',
            'endDate'                       => 'endDate',
            'startPage'                     => 'start-page',
            'haverstTimersEnabled'          => 'harvest-timers-enabled',
            'defaultPrivacy'                => 'defaultPrivacy',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->project)){
            throw new InvalidDataType('project');
        }
        $responseObj = $responseObj->project;
        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(!isset($responseObj->{$propValue}))
            {
               continue;
            }
            switch($propIndex){
                case 'companyId':
                case 'categoryId':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'startDate':
                case 'endDate':
                    $tmpDate =  \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'useTasks':
                case 'useMilestones':
                case 'useMessages':
                case 'useFiles':
                case 'useTime':
                case 'useNotebook':
                case 'useRiskRegSter':
                case 'useLinks':
                case 'useBilling':
                    $responseObj->{$propValue} = $responseObj->{$propValue} == 1 ? true : false;
                    break;
                case 'harvestTimersEnabled':
                    $responseObj->{$propValue} = $responseObj->{$propValue} == 'true' ? true : false;
                    break;
            }
            $setFunc = 'set'.ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return PostPutProject
     */
    public function setName(string $name): PostPutProject
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return PostPutProject
     */
    public function setDescription(string $description): PostPutProject
    {
        $this->description = $description;
        return $this;
    }

    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param int $companyId
     * @return PostPutProject
     */
    public function setCompanyId(int $companyId): PostPutProject
    {
        $this->companyId = $companyId;
        return $this;
    }

    public function getNewCompany()
    {
        return $this->newCompany;
    }

    /**
     * @param string $newCompany
     * @return PostPutProject
     */
    public function setNewCompany(string $newCompany): PostPutProject
    {
        $this->newCompany = $newCompany;
        return $this;
    }

    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \stdClass $company
     * @return PostPutProject
     */
    public function setCompany(\stdClass $company): PostPutProject
    {
        $this->company = $company;
        return $this;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     * @return PostPutProject
     */
    public function setCategoryId(int $categoryId): PostPutProject
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime
     */
    public function getStartDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->startDate;
        }
        return $this->startDate->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $startDate
     * @return PostPutProject
     */
    public function setStartDate(\DateTime $startDate): PostPutProject
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getEndDate(bool $forTw = false)
    {
        if(!$forTw){
            return $this->endDate;
        }
        return $this->endDate->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $endDate
     * @return PostPutProject
     */
    public function setEndDate(\DateTime $endDate): PostPutProject
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseTasks(bool $forTw = false){
        if($forTw){
            return !$this->useTasks ? 0 : 1;
        }
        return $this->useTasks;
    }
    /**
     * @return bool
     */
    public function isUseTasks()
    {
        return $this->useTasks;
    }

    /**
     * @param bool $useTasks
     * @return PostPutProject
     */
    public function setUseTasks(bool $useTasks): PostPutProject
    {
        $this->useTasks = $useTasks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseMilestones(bool $forTw = false){
        if($forTw){
            return !$this->useLinks ? 0 : 1;
        }
        return $this->useMilestones;
    }
    /**
     * @return bool
     */
    public function isUseMilestones()
    {
        return $this->useMilestones;
    }

    /**
     * @param bool $useMilestones
     * @return PostPutProject
     */
    public function setUseMilestones(bool $useMilestones): PostPutProject
    {
        $this->useMilestones = $useMilestones;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseMessages(bool $forTw = false){
        if($forTw){
            return !$this->useMessages ? 0 : 1;
        }
        return $this->useMessages;
    }
    /**
     * @return bool
     */
    public function isUseMessages()
    {
        return $this->useMessages;
    }

    /**
     * @param bool $useMessages
     * @return PostPutProject
     */
    public function setUseMessages(bool $useMessages = true): PostPutProject
    {
        $this->useMessages = $useMessages;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseFiles(bool $forTw = false){
        if($forTw){
            return !$this->useFiles ? 0 : 1;
        }
        return $this->useFiles;
    }

    /**
     * @return bool
     */
    public function isUseFiles()
    {
        return $this->useFiles;
    }

    /**
     * @param bool $useFiles
     * @return PostPutProject
     */
    public function setUseFiles(bool $useFiles = true): PostPutProject
    {
        $this->useFiles = $useFiles;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseTime(bool $forTw = false){
        if($forTw){
            return !$this->useTime ? 0 : 1;
        }
        return $this->useTime;
    }
    /**
     * @return bool
     */
    public function isUseTime()
    {
        return $this->useTime;
    }

    /**
     * @param bool $useTime
     * @return PostPutProject
     */
    public function setUseTime(bool $useTime = true): PostPutProject
    {
        $this->useTime = $useTime;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseNotebook(bool $forTw = false){
        if($forTw){
            return !$this->useNotebook? 0 : 1;
        }
        return $this->useNotebook;
    }

    /**
     * @return bool
     */
    public function isUseNotebook()
    {
        return $this->useNotebook;
    }

    /**
     * @param bool $useNotebook
     * @return PostPutProject
     */
    public function setUseNotebook(bool $useNotebook = true): PostPutProject
    {
        $this->useNotebook = $useNotebook;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseRiskRegister(bool $forTw = false){
        if($forTw){
            return !$this->useRiskRegister ? 0 : 1;
        }
        return $this->useRiskRegister;
    }

    /**
     * @return bool
     */
    public function isUseRiskRegister()
    {
        return $this->useRiskRegister;
    }

    /**
     * @param bool $useRiskRegister
     * @return PostPutProject
     */
    public function setUseRiskRegister(bool $useRiskRegister = true): PostPutProject
    {
        $this->useRiskRegister = $useRiskRegister;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return int
     */
    public function getUseLinks(bool $forTw = false){
        if($forTw){
            return !$this->useLinks ? 0 : 1;
        }
        return $this->useLinks;
    }

    /**
     * @return bool
     */
    public function isUseLinks()
    {
        return $this->useLinks;
    }

    /**
     * @param bool $useLinks
     * @return PostPutProject
     */
    public function setUseLinks(bool $useLinks): PostPutProject
    {
        $this->useLinks = $useLinks;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|int
     */
    public function getUseBilling(bool $forTw = false){
        if($forTw){
            return !$this->useBilling ? 0 : 1;
        }
        return $this->useBilling;
    }
    /**
     * @return bool
     */
    public function isUseBilling()
    {
        return $this->useBilling;
    }

    /**
     * @param bool $useBilling
     * @return PostPutProject
     */
    public function setUseBilling(bool $useBilling): PostPutProject
    {
        $this->useBilling = $useBilling;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartPage()
    {
        return $this->startPage;
    }

    /**
     * @param string $startPage
     * @return PostPutProject
     */
    public function setStartPage(string $startPage = 'projectoverview'): PostPutProject
    {
        $this->startPage = $startPage;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return bool|string
     */
    public function getHarvestTimersEnabled(bool $forTw = false)
    {
        if($forTw){
            return !$this->harvestTimersEnabled ? "false" : "true";
        }
        return $this->harvestTimersEnabled;
    }

    /**
     * @return bool
     */
    public function isHarvestTimersEnabled()
    {
        return $this->harvestTimersEnabled;
    }

    /**
     * @param bool $harvestTimersEnabled
     * @return PostPutProject
     */
    public function setHarvestTimersEnabled(bool $harvestTimersEnabled = true): PostPutProject
    {
        $this->harvestTimersEnabled = $harvestTimersEnabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultPrivacy()
    {
        return $this->defaultPrivacy;
    }

    /**
     * @param string $defaultPrivacy
     * @return PostPutProject
     */
    public function setDefaultPrivacy(string $defaultPrivacy): PostPutProject
    {
        $this->defaultPrivacy = $defaultPrivacy;
        return $this;
    }
}