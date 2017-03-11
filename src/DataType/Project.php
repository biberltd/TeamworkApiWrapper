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

class Project extends BaseDataType
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * format: Y-m-d\TH:i:s\Z
     * @var \DateTime
     */
    private $lastChangedOn;

    /**
     * @var bool
     */
    private $showAnnouncement;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \stdClass
     */
    private $company;

    /**
     * format: Y-m-d\TH:i:s\Z
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @var string
     */
    private $announcement;

    /**
     * @var bool
     */
    private $notifyEveryone;

    /**
     * @var bool
     */
    private $starred;

    /**
     * @var \DateTime
     */
    private $startDate = null;

    /**
     * @var \DateTime
     */
    private $endDate = null;

    /**
     * @var string
     */
    private $startPage;

    /**
     * @var bool
     */
    private $harverstTimersEnabled;

    /**
     * Project constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                            => 'id',
            'name'                          => 'name',
            'lastChangedOn'                 => 'last-changed-on',
            'showAnnouncement'              => 'show-announcement',
            'createdOn'                     => 'created-on',
            'status'                        => 'status',
            'company'                       => 'company',
            'announcement'                  => 'announcement',
            'notifyEveryone'                => 'notify-everyone',
            'starred'                       => 'starred',
            'startDate'                     => 'startDate',
            'endDate'                       => 'endDate',
            'startPage'                     => 'start-page',
            'haverstTimersEnabled'          => 'harvest-timers-enabled',
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
                case 'id':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'lastChangedOn':
                case 'createdOn':
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
     * @return Project
     */
    public function setId(int $id): Project
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Project
     */
    public function setName(string $name): Project
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
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
     * @return Project
     */
    public function setLastChangedOn(\DateTime $lastChangedOn): Project
    {
        $this->lastChangedOn = $lastChangedOn;
        return $this;
    }

    public function getShowAnnouncement(){
        return $this->showAnnouncement;
    }
    /**
     * @return bool
     */
    public function showAnnouncement()
    {
        return $this->showAnnouncement;
    }

    /**
     * @param bool $showAnnouncement
     * @return Project
     */
    public function setShowAnnouncement(bool $showAnnouncement): Project
    {
        $this->showAnnouncement = $showAnnouncement;
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
     * @return Project
     */
    public function setStatus(string $status): Project
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \stdClass
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \stdClass $company
     * @return Project
     */
    public function setCompany(\stdClass $company): Project
    {
        $this->company = $company;
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
        return $this->createdOn->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $createdOn
     * @return Project
     */
    public function setCreatedOn(\DateTime $createdOn): Project
    {
        $this->createdOn = $createdOn;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnouncement()
    {
        return $this->announcement;
    }

    /**
     * @param string $announcement
     * @return Project
     */
    public function setAnnouncement(string $announcement): Project
    {
        $this->announcement = $announcement;
        return $this;
    }

    /**
     * @return bool
     */
    public function getNotifyEveryone(){
        return $this->notifyEveryone;
    }

    /**
     * @return bool
     */
    public function isNotifyEveryone()
    {
        return $this->notifyEveryone;
    }

    /**
     * @param bool $notifyEveryone
     * @return Project
     */
    public function setNotifyEveryone(bool $notifyEveryone = false): Project
    {
        $this->notifyEveryone = $notifyEveryone;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStarred(){
        return $this->starred;
    }

    /**
     * @return bool
     */
    public function isStarred()
    {
        return $this->starred;
    }

    /**
     * @param bool $starred
     * @return Project
     */
    public function setStarred(bool $starred = false): Project
    {
        $this->starred = $starred;
        return $this;
    }
    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getStartDate($forTw = false)
    {
        if(!$forTw){
            return $this->startDate;
        }
        return $this->startDate->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $startDate
     * @return Project
     */
    public function setStartDate(\DateTime $startDate): Project
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
     * @return Project
     */
    public function setEndDate(\DateTime $endDate): Project
    {
        $this->endDate = $endDate;
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
     * @return Project
     */
    public function setStartPage(string $startPage = 'projectoverview'): Project
    {
        $this->startPage = $startPage;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHarverstTimersEnabled()
    {
        return $this->harverstTimersEnabled;
    }

    /**
     * @return bool
     */
    public function isHarverstTimersEnabled()
    {
        return $this->harverstTimersEnabled;
    }

    /**
     * @param bool $harverstTimersEnabled
     * @return Project
     */
    public function setHarverstTimersEnabled(bool $harverstTimersEnabled = false): Project
    {
        $this->harverstTimersEnabled = $harverstTimersEnabled;
        return $this;
    }

}