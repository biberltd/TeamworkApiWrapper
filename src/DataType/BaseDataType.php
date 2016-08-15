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
 */
namespace BiberLtd\TeamworkApiWrapper\DataType;

abstract class BaseDataType{

    /**
     * @var array
     */
    protected $propToJsonMap;

    /**
     * BaseDataType constructor.
     * @param \stdClass|null $responseObj
     */
    public function __construct(\stdClass $responseObj = null){
        if (!is_null($responseObj) && $responseObj instanceof \stdClass){
            $this->convertFromResponseObj($responseObj);
        }
    }

    /**
     * @param array $props
     *
     * @return string
     */
    public final function outputToJson(array $props = []){
        $object = $this->getRepObject($props);

        $jsonStr = json_decode($object);

        foreach($object as $prop => $value){
            if(isseT($this->propToJsonMap[$prop])){
                $jsonStr = str_replace($prop, $this->propToJsonMap[$prop], $jsonStr);
            }
        }

        return $jsonStr;
    }

    /**
     * @param array $props
     *
     * @return string
     */
    public final function getRepObject(array $props = []){
        if(count($props) == 0){
            $props = array_keys(get_class_vars(get_class($this)));
        }
        $repObject = new \stdClass();
        $reservedNames = ['controller', 'dateTimeFormat', 'dateFormat'];
        foreach($props as $propName){
            if(in_array($propName, $reservedNames)){
                continue;
            }
            $getMethod = 'get'.ucfirst($propName);
            if(is_object($this->$getMethod()) && method_exists($this->$getMethod(), 'getRepObject')){
                $repObject->$propName = $this->$getMethod()->getRepObject();
            }
            else if(is_array($this->$getMethod())){
                $collection = [];
                foreach($this->$getMethod() as $item){
                    if(method_exists($item, 'getRepObject')){
                        if(is_object($item)){
                            $collection[] = $item->getRepObject();
                        }
                        else{
                            $collection[] = $item;
                        }
                    }
                    else{
                        $collection[] = $item;
                    }
                }
                $repObject->$propName = $collection;
            }
            else{
                $repObject->$propName = $this->$propName;
            }
        }
        return $repObject;
    }

    abstract public function convertFromResponseObj(\stdClass $object);
}