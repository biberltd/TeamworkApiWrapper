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
 * @see http://developer.teamwork.com/datareference#person
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Person extends BaseDataType
{
    /**
     * @var bool
     */
    public $administrator;

    /**
     * @var string
     */
    public $avatarUrl;

    /**
     * @var int
     */
    public $companyId;

    /**
     * @var string
     */
    public $companyName;

    /**
     * @var string
     */
    public $createdAt;

    /**
     * @var bool
     */
    public $deleted;

    /**
     * @var string
     */
    public $emailAddress;

    /**
     * @var string
     */
    public $firstName;

    /**
     * @var bool
     */
    public $hasAccessToNewProjects;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $imHandle;

    /**
     * @var string
     */
    public $imService;

    /**
     * @var bool
     */
    public $inOwnerCompany;

    /**
     * @var string
     */
    public $lastChangedOn;

    /**
     * @var string
     */
    public $lastLogin;

    /**
     * @var string
     */
    public $lastName;

    /**
     * @var string
     */
    public $notes;

    /**
     * @var \stdClass
     */
    public $permissions;

    /**
     * @var string
     */
    public $phoneNumberFax;

    /**
     * @var string
     */
    public $phoneNumberHome;

    /**
     * @var string
     */
    public $phoneNumberOffice;

    /**
     * @var string
     */
    public $phoneNumberOfficeExt;

    /**
     * @var string
     */
    public $phoneNumberMobile;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $userName;

    /**
     * @var string
     */
    public $userType;

    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'administrator'              => 'administrator',
            'avatarUrl'                  => 'avatar-url',
            'companyId'                  => 'company-id',
            'companyName'                => 'company-name',
            'createdAt'                  => 'created-at',
            'deleted'                    => 'deleted',
            'emailAddress'               => 'email-address',
            'firstName'                  => 'first-name',
            'hasAccessToNewProjects'     => 'has-access-to-new-projects',
            'id'                         => 'id',
            'imHande'                    => 'im-handle',
            'imService'                  => 'im-service',
            'inOwnerCompany'             => 'in-owner-company',
            'lastChangedOn'              => 'last-changed-on',
            'lastLogin'                  => 'last-login',
            'lastName'                   => 'last-name',
            'notes'                      => 'notes',
            'permissions'                => 'permissions',
            'phoneNumberFax'             => 'phone-number-fax',
            'phoneNumberHome'            => 'phone-number-home',
            'phoneNumberOffice'          => 'phone-number-office',
            'phoneNumberOfficeExt'       => 'phone-number-office-ext',
            'phoneNumberMobile'          => 'phone-number-mobile',
            'title'                      => 'title',
            'userName'                   => 'user-name',
            'userType'                   => 'user-type',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->person)){
            throw new InvalidDataType('person');
        }

        $personDetails = $responseObj->person;

        $this->administrator = $personDetails->administrator;
        $this->avatarUrl = $personDetails->{'avatar-url'};
        $this->companyId = $personDetails->{'company-id'};
        $this->companyName = $personDetails->{'company-name'};
        $this->createdAt = $personDetails->{'created-at'};
        $this->deleted = $personDetails->deleted;
        $this->emailAddress = $personDetails->{'email-address'};
        $this->firstName = $personDetails->{'first-name'};
        $this->hasAccessToNewProjects = $personDetails->{'has-access-to-new-projects'};
        $this->id = $personDetails->id;
        $this->imHandle = $personDetails->{'im-handle'};
        $this->imService = $personDetails->{'im-service'};
        $this->inOwnerCompany = $personDetails->{'in-owner-company'};
        $this->lastChangedOn = $personDetails->{'last-changed-on'};
        $this->lastLogin = $personDetails->{'last-login'};
        $this->lastName = $personDetails->{'last-name'};
        $this->notes = $personDetails->notes;
        $this->permissions = $personDetails->permissions;
        $this->phoneNumberFax = $personDetails->{'phone-number-fax'};
        $this->phoneNumberHome = $personDetails->{'phone-number-home'};
        $this->phoneNumberOffice = $personDetails->{'phone-number-office'};
        $this->phoneNumberOfficeExt = $personDetails->{'phone-number-office-ext'};
        $this->phoneNumberMobile = $personDetails->{'phone-number-mobile'};
        $this->title = $personDetails->title;
        $this->userName = $personDetails->{'user-name'};
        $this->userType = $personDetails->{'user-type'};
    }
}