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
namespace BiberLtd\TeamworkApiWrapper\Connector;


use BiberLtd\TeamworkApiWrapper\Exception\MissingConnectionParameter;
use iberLtd\TeamworkApiWrapper\Response\ConnectionResponse;

class TeamworkConnector
{
    /**
     * @var string
     */
    protected $siteDomain;
    /**
     * @var string
     */
    protected $apiKey;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var resource
     */
    private $connection;

    /**
     * TeamworkConnector constructor.
     * @param array $config
     */
    public function __construct(array $config = []){
        $this->siteDomain = isset($config['siteDomain']) ? $config['siteDomain'] : null;
        $this->apiKey = isset($config['apiKey']) ? $config['apiKey'] : null;
        $this->password = isset($config['password']) ? $config['password'] : md5('BOdev');

        $this->connection = curl_init();
    }

    /**
     * @return mixed
     */
    public function getConnection(){
        return $this->connection;
    }

    /**
     * @return mixed
     * @throws MissingConnectionParameter
     */
    public function connect(){

        $connection = $this->getConnection();

        if(is_null($this->siteDomain)){
            throw new MissingConnectionParameter('site domain (siteDomain)');
        }

        if(is_null($this->apiKey)){
            throw new MissingConnectionParameter('api key (apiKey)');
        }

        curl_setopt($connection, CURLOPT_URL, $this->siteDomain);
        curl_setopt($connection, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($connection, CURLOPT_USERPWD, $this->apiKey.':'.$this->password);

        curl_setopt($connection, CURLOPT_TIMEOUT, 30);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER,1);

        return $connection;
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   //get status code
        $result=curl_exec ($ch);
        curl_close ($ch);
    }

    /**
     * @param $connection
     */
    protected function disconnect($connection){
        curl_close($connection);
    }

    public function execute(){
        $connection = $this->connect();
        $httpStatusCode = curl_getinfo($connection, CURLINFO_HTTP_CODE);

        $result = curl_exec($connection);
        $errorCode = curl_errno($connection);
        $errorMsg = curl_error($connection);

        return new ConnectionResponse($result, $httpStatusCode, $errorCode, $errorMsg);
    }
}