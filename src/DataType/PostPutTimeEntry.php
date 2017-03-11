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
 * @see http://developer.teamwork.com/datareference#comment
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;


use BiberLtd\TeamworkApiWrapper\Exception\InvalidDataType;

class PostPutTimeEntry extends BaseDataType
{

    /**
     * format: Ymd
     * @var \DateTime
     */
    private $date;

    /**
     * @var bool
     */
    private $hasStartTime;

    /**
     * format: H:i
     * @var \DateTime
     */
    private $time;

    /**
     * @var int
     */
    private $minutes;

    /**
     * @var int
     */
    private $hours;

    /**
     * @var string
     */
    private $description;

    /**
     * @var bool
     */
    private $markTaskComplete;

    /**
     * comma delimited in TW
     * @var array
     */
    private  $tags;

    /**
     * @var bool
     */
    private $isBillable;

    /**
     * Comment constructor.
     * @param \stdClass|null $responseObj
     * @throws InvalidDataType
     */
    public function __construct(\stdClass $responseObj = null){
        $this->propToJsonMap = [
            'date'                      => 'date',
            'hasStartTime'              => 'has-start-time',
            'time'                      => 'time',
            'minutes'                   => 'minutes',
            'hours'                     => 'hours',
            'description'               => 'description',
            'markTaskComplete'          => 'markTaskComplete',
            'tags'                      => 'tags',
            'isBillable'                => 'isBillable',
        ];
        parent::convertFromResponseObj($responseObj);
    }

    /**
     * @param \stdClass $responseObj
     * @throws InvalidDataType
     */
    public function convertFromResponseObj(\stdClass $responseObj)
    {
        if (!isset($responseObj->{'time-entry'})) {
            throw new InvalidDataType('time-entry');
        }
        $responseObj = $responseObj->{'time-entry'};

        foreach ($this->propToJsonMap as $propIndex => $propValue) {
            if (!isset($responseObj->{$propValue})) {
                continue;
            }
            switch ($propIndex) {
                case 'minutes':
                case 'hours':
                    $responseObj->{$propValue} = (int) $responseObj->{$propValue};
                    break;
                case 'date':
                    $tmpDate = \DateTime::createFromFormat('Ymd', $responseObj->{$propValue});
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
                case 'tags':
                    $tmpCollection = explode(',', $responseObj->{$propValue});
                    for($i = 0; $i < count($tmpCollection); $i++){
                        $tmpCollection[$i] = (int) $tmpCollection[$i];
                    }
                    $responseObj->{$propValue} = $tmpCollection;
                    break;
                case 'time':
                    $tmpDate = \DateTime::createFromFormat('H:i', $responseObj->{$propValue});
                    $responseObj->{$propValue} = $tmpDate;
                    unset($tmpDate);
                    break;
            }
            $setFunc = 'set' . ucfirst($propIndex);
            $this->$setFunc($responseObj->{$propValue});
        }
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return bool
     */
    public fUnction getHasStartTime(){
        return $this->hasStartTime;
    }
    /**
     * @return bool
     */
    public function hasStartTime()
    {
        return $this->hasStartTime;
    }

    /**
     * @param bool $hasStartTime
     * @return $this
     */
    public function setHasStartTime($hasStartTime = true)
    {
        $this->hasStartTime = $hasStartTime;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param \DateTime $time
     * @return $this
     */
    public function setTime(\DateTime $time)
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * @param int $minutes
     * @return $this
     */
    public function setMinutes(int $minutes)
    {
        $this->minutes = $minutes;
        return $this;
    }

    /**
     * @return int
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * @param $hours
     * @return $this
     */
    public function setHours(int $hours)
    {
        $this->hours = $hours;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsTaskComplete(){
        return $this->markTaskComplete;
    }
    /**
     * @return bool
     */
    public function isTaskComplete()
    {
        return $this->markTaskComplete;
    }

    /**
     * @param bool $markTaskComplete
     * @return $this
     */
    public function setMarkTaskComplete($markTaskComplete = false)
    {
        $this->markTaskComplete = $markTaskComplete;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags(bool $forTw = false)
    {
        if(!$forTw){
            return $this->tags;
        }
        return implode(',', $this->tags);
    }

    /**
     * @param array $tags
     * @return $this
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsBillable(){
        return $this->isBillable();
    }

    /**
     * @return bool
     */
    public function isBillable()
    {
        return $this->isBillable;
    }

    /**
     * @param $isBillable
     * @return $this
     */
    public function setIsBillable($isBillable = false)
    {
        $this->isBillable = $isBillable;
        return $this;
    }
}