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
use GuzzleHttp\Client;
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
     * @var integer
     */
    protected $timeout;
    /**
     * @var string
     */
    protected $password;
    /**
     * @var Client
     */
    private $client;

    /**
     * TeamworkConnector constructor.
     * @param array $config
     */
    public function __construct(array $config = []){
        $this->siteDomain = isset($config['siteDomain']) ? $config['siteDomain'] : null;
        $this->apiKey = isset($config['apiKey']) ? $config['apiKey'] : null;
        $this->password = isset($config['password']) ? $config['password'] : md5('BOdev');
        $this->timeout = isset($config['timeout']) ? $config['timeout'] : 10;

        $this->setClient($this->siteDomain);
    }

    /**
     * @param string|null $url
     * @param int $timeout
     * @return $this
     */
    public function setClient(string $url = null, integer $timeout = 10){
        $this->client = new Client(
            [
                'base_uri'      => $url ?? $this->siteDomain,
                'timeout'       => $this->timeout
            ]
        );
        /**
         * Update runtime settings
         */
        $this->siteDomain = $url ?? $this->url;
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * @return Client
     */
    public function getClient(){
        return $this->client;
    }

    /**
     * @param string $endpoint
     * @param string|null $method
     * @param array $options
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws MissingConnectionParameter
     */
    public function connectTo(string $endpoint, string $method = null, array $options = []){
        if(!$this->client instanceof Client){
            $this->setClient();
        }

        if(is_null($this->siteDomain)){
            throw new MissingConnectionParameter('site domain (siteDomain)');
        }

        if(is_null($this->apiKey)){
            throw new MissingConnectionParameter('api key (apiKey)');
        }

        $defaultOptions['headers'] = [
          'Accept'          => 'application/json',
          'Content-Type'    => 'application/json',
          'Authorization'   => 'Basic '.$this->apiKey.':'.$this->password,
          'X-Authorization'   => 'Basic '.$this->apiKey.':'.$this->password,
        ];

        $method = $method ?? 'GET';

        if(!is_null($options)){
            $options = array_merge($defaultOptions, $options);
        }

       return $this->client->request($method, $this->siteDomain.'/'.$endpoint, $options);
    }
}