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
namespace BiberLtd\TeamworkApiWrapper\Response;


class ConnectionResponse
{

    public $response;
    public $httpStatus = 200;
    public $apiErrCode = 200;
    public $apiErrMsg  = '';

    /**
     * ConnectionResponse constructor.
     *
     * @param $response
     * @param string|null $httpStatus
     * @param null $apiErrCode
     * @param null $apErrMsg
     */
    public function __construct($response, string $httpStatus = null, $apiErrCode = null, $apErrMsg = null){
        $this->httpStatus = $httpStatus ?? 200;
        $this->apiErrCode = $apiErrCode ?? 200;
        $this->apiErrMsg  = $apErrMsg ?? '';
    }
}