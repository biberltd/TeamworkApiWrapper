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
 * @see http://developer.teamwork.com/datareference#company
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Company extends BaseDataType
{

    /**
     * @var string
     */
    public $addressOne;

    /**
     * @var string
     */
    public $addressTwo;

    /**
     * @var bool
     */
    public $canSeePrivate = false;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $companyNameUrl;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $fax;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $website;

    /**
     * @var string
     */
    public $zip;

    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'addressOne'                => 'address_one',
            'addressTwo'                => 'address_two',
            'canSeePrivate'             => 'can_see_private',
            'city'                      => 'city',
            'country'                   => 'country',
            'companyNameUrl'            => 'company_name_url',
            'fax'                       => 'fax',
            'id'                        => 'id',
            'name'                      => 'name',
            'phone'                     => 'phone',
            'state'                     => 'state',
            'website'                   => 'website',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->company)) {
            throw new InvalidDataType('company');
        }
        $responseObj = $responseObj->company;

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'id':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
            }
            $setFunc = 'set' . ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function setCanSeePrivate(bool $status = false){
        $this->canSeePrivate = $status;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanSeePrivate(){
        return $this->canSeePrivate;
    }

    /**
     * @return bool
     */
    public function canSeePrivate(){
        return $this->getCanSeePrivate();
    }

    /**
     * @return string
     */
    public function getAddressOne()
    {
        return $this->addressOne;
    }

    /**
     * @param string $addressOne
     * @return Company
     */
    public function setAddressOne(string $addressOne): Company
    {
        $this->addressOne = $addressOne;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressTwo()
    {
        return $this->addressTwo;
    }

    /**
     * @param string $addressTwo
     * @return Company
     */
    public function setAddressTwo(string $addressTwo): Company
    {
        $this->addressTwo = $addressTwo;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Company
     */
    public function setCity(string $city): Company
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyNameUrl()
    {
        return $this->companyNameUrl;
    }

    /**
     * @param string $companyNameUrl
     * @return Company
     */
    public function setCompanyNameUrl(string $companyNameUrl = ''): Company
    {
        $this->companyNameUrl = $companyNameUrl;
        return $this;
    }

    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Company
     */
    public function setCountry(string $country): Company
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param string $fax
     * @return Company
     */
    public function setFax(string $fax): Company
    {
        $this->fax = $fax;
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
     * @return Company
     */
    public function setId(int $id): Company
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
     * @return Company
     */
    public function setName(string $name): Company
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Company
     */
    public function setPhone(string $phone): Company
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Company
     */
    public function setState(string $state): Company
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return Company
     */
    public function setWebsite(string $website): Company
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param string $zip
     * @return Company
     */
    public function setZip(string $zip): Company
    {
        $this->zip = $zip;
        return $this;
    }


}