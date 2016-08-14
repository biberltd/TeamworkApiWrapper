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
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Account
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
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj){
        if(!isset($responseObj->account)){
            throw new InvalidDataType('account');
        }

        $accDetails = $responseObj->account;

        $this->accountHolderId = $accDetails->accountholderid;
        $this->cacheUuid = $accDetails->cacheUUID;
        $this->code = $accDetails->code;
        $this->companyId = $accDetails->companyid;
        $this->companyName = $accDetails->companyname;
        $this->createdAt = $accDetails->createdat;
        $this->dateSignedUp = $accDetails->datesignedup;
        $this->emailNotificationEnabled = $accDetails->emailnotificationenabled;
        $this->id = $accDetails->id;
        $this->lang = $accDetails->lang;
        $this->logo = $accDetails->logo;
        $this->name = $accDetails->name;
        $this->requireHttps = $accDetails->requirehttps;
        $this->sslEnabled = $accDetails->sslenabled;
        $this->timeTrackingEnabled = $accDetails->timetrackingenabled;
        $this->url = $accDetails->URL;

    }

}