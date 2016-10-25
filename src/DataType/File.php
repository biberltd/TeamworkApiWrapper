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

class File extends FileAbstract
{

    public $commentsCountRead;
    public $commentNotifyIds;
    public $privacyHtml;
    public $versionId;
    public $downloadUrl;
    public $fileLocked;
    public $thumbUrl;
    public $displayName;
    public $combinedFollowersCount;
    public $privacyText;
    public $latestVersion;
    public $projectName;
    public $relatedItems;

    protected $extendData=array();
    /**
     * Account constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->extendData = [
            'commentsCountRead'         => 'comments-count-read',
            'commentNotifyIds'          => 'commentNotifyIds',
            'privacyHtml'               => 'privacyHtml',
            'versionId'                 => 'version-id',
            'downloadUrl'               => 'download-URL',
            'fileLocked'                => 'fileLocked',
            'thumbUrl'                  => 'thumbURL',
            'displayName'               => 'display-name',
            'combinedFollowersCount'    => 'combinedFollowersCount',
            'privacyText'               => 'privacyText',
            'latestVersion'             => 'latest-version',
            'projectName'               => 'project-name',
            'relatedItems'              => 'related-items',
        ];

    }


}