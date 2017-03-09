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
     * @var \DateTime
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
     * Tw sends it as a numeric string.
     * @var bool
     */
    public $inOwnerCompany;

    /**
     * @var \DateTime
     */
    public $lastChangedOn;

    /**
     * @var \DateTime
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
     * "account" or "contact" default: "account"
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
        if (!isset($responseObj->notebook)) {
            throw new InvalidDataType('person');
        }
        $responseObj = $responseObj->person;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'id':
                case 'companyId':
                    $responseObj->{$propValue} = (int)$responseObj->{$propValue};
                    break;
                case 'createdAt':
                case 'lastLogin':
                case 'lastChangedOn':
                    $tmpDate = \DateTime::createFromFormat('Y-m-d H:i:s', str_replace(['T', 'Z'], [' ', ''], $responseObj->{$propValue}));
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'inOwnerCompany':
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
    public function getAdministrator()
    {
        return $this->administrator;
    }

    /**
     * @return bool
     */
    public function isAdministrator()
    {
        return $this->getAdministrator();
    }

    /**
     * @param bool $administrator
     * @return Person
     */
    public function setAdministrator(bool $administrator = true): Person
    {
        $this->administrator = $administrator;
        return $this;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * @param string $avatarUrl
     * @return Person
     */
    public function setAvatarUrl(string $avatarUrl = null): Person
    {
        $this->avatarUrl = $avatarUrl ?? '';
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
     * @return Person
     */
    public function setCompanyId(int $companyId): Person
    {
        $this->companyId = $companyId;
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
     * @return Person
     */
    public function setCompanyName(string $companyName): Person
    {
        $this->companyName = $companyName;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime
     */
    public function getCreatedAt(bool $forTw = false)
    {
        if(!$forTw){
            return $this->createdAt;
        }
        return $this->createdAt->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $createdAt
     * @return Person
     */
    public function setCreatedAt(\DateTime $createdAt): Person
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDeleted(){
        return $this->deleted;
    }

    /**
     * @return bool
     */
    public function isDeleted()
    {
        return $this->getDeleted();
    }

    /**
     * @param bool $deleted
     * @return Person
     */
    public function setDeleted(bool $deleted = false): Person
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     * @return Person
     */
    public function setEmailAddress(string $emailAddress): Person
    {
        $this->emailAddress = $emailAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Person
     */
    public function setFirstName(string $firstName): Person
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAccessToNewPorjects(){
        return $this->hasAccessToNewProjects;
    }
    /**
     * @return bool
     */

    public function hasAccessToNewProjects()
    {
        return $this->getHasAccessToNewPorjects();
    }

    /**
     * @param bool $hasAccessToNewProjects
     * @return Person
     */
    public function setHasAccessToNewProjects(bool $hasAccessToNewProjects = false): Person
    {
        $this->hasAccessToNewProjects = $hasAccessToNewProjects;
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
     * @return Person
     */
    public function setId(int $id): Person
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImHandle()
    {
        return $this->imHandle;
    }

    /**
     * @param string $imHandle
     * @return Person
     */
    public function setImHandle(string $imHandle): Person
    {
        $this->imHandle = $imHandle;
        return $this;
    }

    /**
     * @return string
     */
    public function getImService()
    {
        return $this->imService;
    }

    /**
     * @param string $imService
     * @return Person
     */
    public function setImService(string $imService): Person
    {
        $this->imService = $imService;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsInOwnerCompany(){
        return $this->inOwnerCompany;
    }

    /**
     * @return bool
     */
    public function isInOwnerCompany()
    {
        return $this->getIsInOwnerCompany();
    }

    /**
     * @param bool $inOwnerCompany
     * @return Person
     */
    public function setInOwnerCompany(bool $inOwnerCompany): Person
    {
        $this->inOwnerCompany = $inOwnerCompany;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime
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
     * @return Person
     */
    public function setLastChangedOn(\DateTime $lastChangedOn): Person
    {
        $this->lastChangedOn = $lastChangedOn;
        return $this;
    }

    /**
     * @param bool $forTw
     * @return \DateTime
     */
    public function getLastLogin(bool $forTw = false)
    {
        if(!$forTw){
            return $this->lastLogin;
        }
        return $this->lastLogin->format('Y-m-d\TH:i:s\Z');
    }

    /**
     * @param \DateTime $lastLogin
     * @return Person
     */
    public function setLastLogin(\DateTime $lastLogin): Person
    {
        $this->lastLogin = $lastLogin;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Person
     */
    public function setLastName(string $lastName): Person
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return Person
     */
    public function setNotes(string $notes): Person
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return \stdClass|bool
     */
    public function getPermissions(string $key = null)
    {
        if(!is_null($key) && isset($this->permissions->$key)){
            return $this->permissions->$key;
        }
        return $this->permissions;
    }

    /**
     * @param \stdClass $permissions
     * @return Person
     */
    public function setPermissions(\stdClass $permissions): Person
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumberFax()
    {
        return $this->phoneNumberFax;
    }

    /**
     * @param string $phoneNumberFax
     * @return Person
     */
    public function setPhoneNumberFax(string $phoneNumberFax): Person
    {
        $this->phoneNumberFax = $phoneNumberFax;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumberHome()
    {
        return $this->phoneNumberHome;
    }

    /**
     * @param string $phoneNumberHome
     * @return Person
     */
    public function setPhoneNumberHome(string $phoneNumberHome): Person
    {
        $this->phoneNumberHome = $phoneNumberHome;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumberOffice()
    {
        return $this->phoneNumberOffice;
    }

    /**
     * @param string $phoneNumberOffice
     * @return Person
     */
    public function setPhoneNumberOffice(string $phoneNumberOffice): Person
    {
        $this->phoneNumberOffice = $phoneNumberOffice;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumberOfficeExt()
    {
        return $this->phoneNumberOfficeExt;
    }

    /**
     * @param string $phoneNumberOfficeExt
     * @return Person
     */
    public function setPhoneNumberOfficeExt(string $phoneNumberOfficeExt): Person
    {
        $this->phoneNumberOfficeExt = $phoneNumberOfficeExt;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumberMobile()
    {
        return $this->phoneNumberMobile;
    }

    /**
     * @param string $phoneNumberMobile
     * @return Person
     */
    public function setPhoneNumberMobile(string $phoneNumberMobile): Person
    {
        $this->phoneNumberMobile = $phoneNumberMobile;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Person
     */
    public function setTitle(string $title): Person
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param string $userName
     * @return Person
     */
    public function setUserName(string $userName): Person
    {
        $this->userName = $userName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param string $userType
     * @return Person
     */
    public function setUserType(string $userType = 'account'): Person
    {
        $defaultType = 'account';
        $options = [$defaultType, 'contact'];
        if(!in_array($userType, $options)){
            $userType = $defaultType;
        }
        $this->userType = $userType;
        return $this;
    }
}