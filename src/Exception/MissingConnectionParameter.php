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
namespace BiberLtd\TeamworkApiWrapper\Exception;


class MissingConnectionParameter extends \Exception
{

    /**
     * MissingConnectionParameter constructor.
     * @param string $parameter
     * @param Exception|null $previous
     */
    public function __construct(string $parameter, Exception $previous = null)
    {
        $message = 'You need to set '.$parameter.' in order to initiate a connection with Teamwork.com.';
        $code = 4003;
        parent::__construct($message, $code, $previous);
    }

}