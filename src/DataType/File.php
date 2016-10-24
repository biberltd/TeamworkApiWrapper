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
     * @var string
     */
    public $code;

    /**
     * @var string
     */
    public $companyId;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var string
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
        if(!isset($responseObj->account)){
            throw new InvalidDataType('account');
        }

        $accDetails = $responseObj->account;

        $this->accountHolderId = $accDetails->{'account-holder-id'};
        $this->cacheUuid = $accDetails->cacheUUID;
        $this->code = $accDetails->code;
        $this->companyId = $accDetails->companyid;
        $this->companyName = $accDetails->companyname;
        $this->createdAt = $accDetails->{'created-at'};
        $this->dateSignedUp = $accDetails->datesignedup;
        $this->emailNotificationEnabled = $accDetails->{'email-notification-enabled'};
        $this->id = $accDetails->id;
        $this->lang = $accDetails->lang;
        $this->logo = $accDetails->logo;
        $this->name = $accDetails->name;
        $this->requireHttps = $accDetails->requirehttps;
        $this->sslEnabled = $accDetails->{'ssl-enabled'};
        $this->timeTrackingEnabled = $accDetails->{'time-tracking-enabled'};
        $this->url = $accDetails->URL;
    }
}