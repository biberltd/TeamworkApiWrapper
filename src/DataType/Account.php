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
 * @see http://developer.teamwork.com/datareference#account
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Account extends BaseDataType
{
    /**
     * @var int
     */
    public $accountHolderId;

    /**
     * @var string
     */
    public $cacheUuid;

    /**
     * @var int
     */
    public $companyName;

    /**
     * TeamWork site code.
     * @var string
     */
    public $code;

    /**
     * @var int
     */
    public $companyId;

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var \DateTime
     */
    public $dateSignedUp;

    /**
     * @var bool
     */
    public $emailNotificationEnabled;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $lang;

    /**
     * @var string
     */
    public $logo;

    /**
     * TeamWork account name.
     * @var string
     */
    public $name;

    /**
     * @var bool
     */
    public $requireHttps;

    /**
     * @var bool
     */
    public $sslEnabled;

    /**
     * @var bool
     */
    public $timeTrackingEnabled;

    /**
     * @var string
     */
    public $url;


    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
          'accountHolderId'             => 'account-holder-id',
          'cacheUuid'                   => 'cacheUUID',
          'companyId'                   => 'companyid',
          'companyName'                 => 'companyname',
          'code'                        => 'code',
          'createdAt'                   => 'created-at',
          'dateSignedUp'                => 'datesignedup',
          'emailNotificationEnabled'    => 'email-notification-enabled',
          'id'                          => 'id',
          'lang'                        => 'lang',
          'logo'                        => 'logo',
          'name'                        => 'name',
          'requireHttps'                => 'requirehttps',
          'sslEnabled'                  => 'ssl-enabled',
          'timeTrackingEnabled'         => 'time-tracking-enabled',
          'url'                         => 'URL',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'account'})) {
            throw new InvalidDataType('account');
        }
        $responseObj = $responseObj->person;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'companyId':
                case 'id':
                case 'accountHolderId':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'dateSignedUp':
                case 'createdAt':
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
    public function getAccountHolderId()
    {
        return $this->accountHolderId;
    }

    /**
     * @param int $accountHolderId
     * @return Account
     */
    public function setAccountHolderId(int $accountHolderId): Account
    {
        $this->accountHolderId = $accountHolderId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCacheUuid()
    {
        return $this->cacheUuid;
    }

    /**
     * @param string $cacheUuid
     * @return Account
     */
    public function setCacheUuid(string $cacheUuid): Account
    {
        $this->cacheUuid = $cacheUuid;
        return $this;
    }

    /**
     * @return int
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param int $companyName
     * @return Account
     */
    public function setCompanyName(int $companyName): Account
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Account
     */
    public function setCode(string $code): Account
    {
        $this->code = $code;
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
     * @return Account
     */
    public function setCompanyId(int $companyId): Account
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getCreatedAt(bool $forTw = false)
    {
        if(!$forTw){
            return $this->createdAt;
        }
        return $this->createdAt->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param string $createdAt
     * @return Account
     */
    public function setCreatedAt(string $createdAt): Account
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime|string
     */
    public function getDateSignedUp(bool $forTw = false)
    {
        if(!$forTw){
            return $this->dateSignedUp;
        }
        return $this->dateSignedUp->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param string $dateSignedUp
     * @return Account
     */
    public function setDateSignedUp(string $dateSignedUp): Account
    {
        $this->dateSignedUp = $dateSignedUp;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEmailNotificationEnabled(){
        return $this->emailNotificationEnabled;
    }
    /**
     * @return bool
     */
    public function isEmailNotificationEnabled()
    {
        return $this->emailNotificationEnabled;
    }

    /**
     * @param bool $emailNotificationEnabled
     * @return Account
     */
    public function setEmailNotificationEnabled(bool $emailNotificationEnabled): Account
    {
        $this->emailNotificationEnabled = $emailNotificationEnabled;
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
     * @return Account
     */
    public function setId(int $id): Account
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param string $lang
     * @return Account
     */
    public function setLang(string $lang): Account
    {
        $this->lang = $lang;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     * @return Account
     */
    public function setLogo(string $logo = ''): Account
    {
        $this->logo = $logo;
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
     * @return Account
     */
    public function setName(string $name): Account
    {
        $this->name = $name;
        return $this;
    }

    public function getRequiredHttps(){
        $this->requireHttps;
    }

    /**
     * @return bool
     */
    public function isRequireHttps()
    {
        return $this->requireHttps;
    }

    /**
     * @param bool $requireHttps
     * @return Account
     */
    public function setRequireHttps(bool $requireHttps = false): Account
    {
        $this->requireHttps = $requireHttps;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSslEnabled(){
        return $this->sslEnabled;
    }
    /**
     * @return bool
     */
    public function isSslEnabled()
    {
        return $this->sslEnabled;
    }

    /**
     * @param bool $sslEnabled
     * @return Account
     */
    public function setSslEnabled(bool $sslEnabled = true): Account
    {
        $this->sslEnabled = $sslEnabled;
        return $this;
    }

    /**
     * @return bool
     */
    public function getTimeTrackingEnabled(){
        return $this->timeTrackingEnabled;
    }
    /**
     * @return bool
     */
    public function isTimeTrackingEnabled()
    {
        return $this->timeTrackingEnabled;
    }

    /**
     * @param bool $timeTrackingEnabled
     * @return Account
     */
    public function setTimeTrackingEnabled(bool $timeTrackingEnabled = true): Account
    {
        $this->timeTrackingEnabled = $timeTrackingEnabled;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Account
     */
    public function setUrl(string $url = ''): Account
    {
        $this->url = $url;
        return $this;
    }

}