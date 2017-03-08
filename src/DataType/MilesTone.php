<?php
/**
 * Created by PhpStorm.
 * User: erman.titiz
 * Date: 26/10/16
 * Time: 12:47
 */

namespace BiberLtd\TeamworkApiWrapper\DataType;


class MilesTone extends BaseDataType
{

    /**
     * @var boolean
     */
    public $canComplete;

    /**
     * @var int
     */
    public $projectId;

    /**
     * @var int
     */
    public $responsiblePartyId;

    /**
     * @var int
     */
    public $completerId;

    /**
     * @var int
     */
    public $userFollowingComments;

    /**
     * @var int
     */
    public $commentsCount;

    /**
     * @var int
     */
    public $private;

    /**
     * @var string
     */
    public $completedOn;

    /**
     * @var string
     */
    public $status;

    /**
     * @var array
     */
    public $changeFollowerIds;

    /**
     * @var string
     */
    public $createdOn;

    /**
     * @var array
     */
    public $tags;

    /**
     * @var boolean
     */
    public $canEdit;

    /**
     * @var string
     */
    public $responsiblePartyType;

    /**
     * @var string
     */
    public $isprivate;

    /**
     * @var string
     */
    public $companyName;

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $lastChangedOn;

    /**
     * @var array
     */
    public $commentFollowerIds;

    /**
     * @var boolean
     */
    public $completed;

    /**
     * @var string
     */
    public $reminder;

    /**
     * @var array
     */
    public $taskLists;

    /**
     * @var boolean
     */
    public $userFollowingChanges;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $responsiblePartyFirstName;

    /**
     * @var string
     */
    public $completerFirstName;

    /**
     * @var string
     */
    public $responsiblePartyIds;

    /**
     * @var string
     */
    public $responsiblePartyNames;

    /**
     * @var string
     */
    public $responsiblePartyLastName;

    /**
     * @var int
     */
    public $companyId;

    /**
     * @var int
     */
    public $creatorId;

    /**
     * @var string
     */
    public $completerLastName;

    /**
     * @var string
     */
    public $projectName;

    /**
     * @var string
     */
    public $deadline;

    /**
     * @var array
     */
    public $_isPrivate;

    /**
     * @var string
     */
    public $title;

        /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'canComplete'                   => 'canComplete',
            'projectId'                     => 'project-id',
            'responsiblePartyId'            => 'responsible-party-id',
            'completerId'                   => 'completer-id',
            'userFollowingComments'         => 'userFollowingComments',
            'commentsCount'                 => 'comments-count',
            'private'                       => 'private',
            'completedOn'                   => 'completed-on',
            'status'                        => 'status',
            'changeFollowerIds'             => 'changeFollowerIds',
            'createdOn'                     => 'created-on',
            'tags'                          => 'tags',
            'canEdit'                       => 'canEdit',
            'responsiblePartyType'          => 'responsible-party-type',
            'isPrivate'                     => 'isprivate',
            'companyName'                   => 'company-name',
            'id'                            => 'id',
            'lastChangedOn'                 => 'last-changed-on',
            'commentFollowerIds'            => 'commentFollowerIds',
            'completed'                     => 'completed',
            'reminder'                      => 'reminder',
            'taskLists'                     => 'tasklists',
            'userFollowingChanges'          => 'userFollowingChanges',
            'description'                   => 'description',
            'responsiblePartyFirstName'     => 'responsible-party-firstname',
            'responsiblePartyIds'           => 'responsible-party-ids',
            'completerFirstName'            => 'completer-firstname',
            'responsiblePartyNames'         => 'responsible-party-names',
            'responsiblePartyLastName'      => 'responsible-party-lastname',
            'companyId'                     => 'company-id',
            'creatorId'                     => 'creator-id',
            'completerLastName'             => 'completer-lastname',
            'projectName'                   => 'project-name',
            'deadline'                      => 'deadline',
            '_isPrivate'                    => '_isprivate',
            'title'                         => 'title',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        foreach ($this->propToJsonMap as $propIndex => $propValue)
        {
            if(isset($responseObj->{$propValue}))
            {
                $this->{$propIndex} = $responseObj->{$propValue};
            }
        }
    }

}