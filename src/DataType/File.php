<?php
/**
 * 2016 (C) Biber Ltd. | http://www.biberltd.com
 *
 * @license     MIT
 * @author      Erman Titiz
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

class File extends BaseDataType
{

    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $projectId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $originalName;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $extraData;

    /**
     * @var int
     */
    public $size;

    /**
     * @var int
     */
    public $private;

    /**
     * @var string
     */
    public $status;

    /**
     * @var int
     */
    public $version;

    /**
     * @var int
     */
    public $versionId;

    /**
     * @var array
     */
    public $versions;

    /**
     * @var string
     */
    public $fileSource;

    /**
     * @var int
     */
    public $categoryId;

    /**
     * @var int
     */
    public $categoryName;

    /**
     * @var string
     */
    public $uploadedByUserId;

    /**
     * @var string
     */
    public $uploadedByUserFirstName;

    /**
     * @var string
     */
    public $uploadedByUserLastName;

    /**
     * @var string
     */
    public $uploadedDate;

    /**
     * @var string
     */
    public $lastChangedOn;

    /**
     * @var int
     */
    public $commentsCount;

    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'id'                        => 'id',
            'projectId'                 => 'project-id',
            'name'                      => 'name',
            'originalName'              => 'originalName',
            'description'               => 'description',
            'extraData'                 => 'extraData',
            'size'                      => 'size',
            'private'                   => 'private',
            'status'                    => 'status',
            'version'                   => 'version',
            'versionId'                 => 'version-id',
            'versions'                  => 'versions',
            'fileSource'                => 'file-source',
            'categoryId'                => 'category-id',
            'categoryName'              => 'category-name',
            'uploadedByUserId'          => 'uploaded-by-user-id',
            'uploadedByUserFirstName'   => 'uploaded-by-user-first-name',
            'uploadedByUserLastName'    => 'uploaded-by-user-last-name',
            'uploadedDate'              => 'uploaded-date',
            'lastChangedOn'             => 'last-changed-on',
            'commentsCount'             => 'comments-count',
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
            throw new InvalidDataType('file');
        }

        $this->id                           = $responseObj->id;
        $this->projectId                    = $responseObj->{'project-id'};
        $this->name                         = $responseObj->name;
        $this->originalName                 = $responseObj->originalName;
        $this->description                  = $responseObj->description;
        $this->extraData                    = $responseObj->extraData;
        $this->size                         = $responseObj->size;
        $this->private                      = $responseObj->private;
        $this->status                       = $responseObj->status;
        $this->version                      = $responseObj->version;
        $this->versionId                    = $responseObj->{'version-id'};
        $this->versions                     = $responseObj->versions;
        $this->fileSource                   = $responseObj->{'file-source'};
        $this->categoryId                   = $responseObj->{'category-id'};
        $this->categoryName                 = $responseObj->{'category-name'};
        $this->uploadedByUserId             = $responseObj->{'uploaded-by-user-id'};
        $this->uploadedByUserFirstName      = $responseObj->{'uploaded-by-user-first-name'};
        $this->uploadedByUserLastName       = $responseObj->{'uploaded-by-user-last-name'};
        $this->uploadedDate                 = $responseObj->{'uploaded-date'};
        $this->lastChangedOn                = $responseObj->{'last-changed-on'};
        $this->commentsCount                = $responseObj->{'comments-count'};
    }
}