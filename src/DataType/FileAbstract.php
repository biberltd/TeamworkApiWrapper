<?php
/**
 * Created by PhpStorm.
 * User: erman.titiz
 * Date: 24/10/16
 * Time: 15:47
 */

namespace BiberLtd\TeamworkApiWrapper\DataType;


abstract class FileAbstract extends BaseDataType
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
     * @var array
     */
    public $tags;

    /**
     * @var string
     */
    public $changeFollowerIds;

    /**
     * @var string
     */
    public $commentFollowerIds;

    /**
     * @var int
     */
    public $lockdownId;

    /**
     * @var boolean
     */
    public $canUploadNewVersion;

    /**
     * @var boolean
     */
    public $userFollowingComments;

    /**
     * @var boolean
     */
    public $userFollowingChanges;

    /**
     * @var boolean
     */
    public $shareable;


    protected $extendData=array();
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
            'filenameOnDisk'            => 'filenameOnDisk',
            'originalName'              => 'originalName',
            'description'               => 'description',
            'extraData'                 => 'extraData',
            'size'                      => 'size',
            'private'                   => 'private',
            'status'                    => 'status',
            'version'                   => 'version',
            'fileSource'                => 'file-source',
            'categoryId'                => 'category-id',
            'categoryName'              => 'category-name',
            'uploadedByUserId'          => 'uploaded-by-user-id',
            'uploadedByUserFirstName'   => 'uploaded-by-user-first-name',
            'uploadedByUserLastName'    => 'uploaded-by-user-last-name',
            'uploadedDate'              => 'uploaded-date',
            'commentsCount'             => 'comments-count',
            'tags'                      => 'tags',
            'changeFollowerIds'         => 'changeFollowerIds',
            'commentFollowerIds'        => 'commentFollowerIds',
            'lockdownId'                => 'lockdownId',
            'canUploadNewVersion'       => 'can-upload-new-version',
            'userFollowingComments'     => 'userFollowingComments',
            'userFollowingChanges'      => 'userFollowingChanges',
            'shareable'                 => 'shareable',
        ];
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        $this->propToJsonMap=array_merge($this->propToJsonMap,$this->extendData);

        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(isset($responseObj->{$propValue}))
            {
                $this->{$propIndex} = $responseObj->{$propValue};
            }
        }
    }

}