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
 * @see http://developer.teamwork.com/datareference#notebook
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class Notebook extends BaseDataType
{

    /**
     * @var int
     */
    public $categoryId;

    /**
     * @var string
     */
    public $categoryName;

    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $createdByUserFirstName;

    /**
     * @var int
     */
    public $createdByUserId;

    /**
     * @var string
     */
    public $createdByUserLastName;

    /**
     * @var string
     */
    public $createdDate;

    /**
     * @var string
     */
    public $description;

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $locked;

    /**
     * @var string
     */
    public $lockedByUserFirstName;

    /**
     * @var string
     */
    public $lockedByUserId;

    /**
     * @var string
     */
    public $lockedByUserLastName;

    /**
     * @var string
     */
    public $lockedDate;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $private;

    /**
     * @var int
     */
    public $projectId;


    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'categoryId'                 => 'category-id',
            'categoryName'               => 'category-name',
            'content'                    => 'content',
            'createdByUserFirstName'     => 'created-by-userfirstname',
            'createdByUserId'            => 'created-by-userId',
            'createdByUserLastName'      => 'created-by-userlastname',
            'createdDate'                => 'created-date',
            'description'                => 'description',
            'id'                         => 'id',
            'locked'                     => 'locked',
            'lockedByUserFirstName'      => 'locked-by-userfirstname',
            'lockedByUserId'             => 'locked-by-userId',
            'lockedByUserLastName'       => 'locked-by-userlastname',
            'lockedDate'                 => 'locked-date',
            'name'                       => 'name',
            'private'                    => 'private',
            'projectId'                  => 'project-id',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if(!isset($responseObj->notebook)){
            throw new InvalidDataType('notebook');
        }

        $notebookDetails = $responseObj->notebook;

        $this->categoryId = $notebookDetails->{'category-id'};
        $this->categoryName = $notebookDetails->{'category-name'};
        $this->content = $notebookDetails->content;
        $this->createdByUserFirstName = $notebookDetails->{'created-by-userfirstname'};
        $this->createdByUserId = $notebookDetails->{'created-by-userId'};
        $this->createdByUserLastName = $notebookDetails->{'created-by-userlastname'};
        $this->createdDate = $notebookDetails->{'created-date'};
        $this->description = $notebookDetails->description;
        $this->id = $notebookDetails->id;
        $this->locked = $notebookDetails->locked;
        $this->lockedByUserFirstName = $notebookDetails->{'locked-by-userfirstname'};
        $this->lockedByUserId = $notebookDetails->{'locked-by-userid'};
        $this->lockedByUserLastName = $notebookDetails->{'locked-by-userlastname'};
        $this->lockedDate = $notebookDetails->{'locked-date'};
        $this->name = $notebookDetails->name;
        $this->private = $notebookDetails->private;
        $this->projectId = $notebookDetails->{'project-id'};
    }
}