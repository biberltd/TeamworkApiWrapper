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
        if(!isset($responseObj->company)){
            throw new InvalidDataType('company');
        }

        $compDetails = $responseObj->comment;

        $this->addressOne = $compDetails->address_one;
        $this->addressTwo = $compDetails->address_two;
        $this->canSeePrivate = $this->setCanSeePrivate($compDetails->can_see_private ?? $this->canSeePrivate);
        $this->city = $compDetails->city;
        $this->companyNameUrl = $compDetails->company_name_url;
        $this->country = $compDetails->country;
        $this->fax = $compDetails->fax;
        $this->id = $compDetails->id;
        $this->name = $compDetails->name;
        $this->phone = $compDetails->phone;
        $this->state = $compDetails->state;
        $this->website = $compDetails->website;
        $this->zip = $compDetails->zip;
    }

    /**
     * @param bool $status
     * @return $this
     */
    public function setCanSeePrivate(bool $status = false){
        $this->canSeePrivate = $status;
        return $this;
    }
}