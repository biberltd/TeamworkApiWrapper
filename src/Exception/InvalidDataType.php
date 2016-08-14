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


class InvalidDataType extends \Exception
{

    /**
     * InvalidDataType constructor.
     * @param string $dataType
     * @param Exception|null $previous
     */
    public function __construct(string $dataType, Exception $previous = null)
    {
        $message = 'Invalid data type given. You need to provide "'.$dataType.'".';
        $code = 4004;
        parent::__construct($message, $code, $previous);
    }

}