<?php

/**
 * Behandelt die Variablen im Request GET / POST
 * Syntax:
 * $request = getVar( "Name", "Default Wert falls kein Wert gefunden wurde", "POST/GET" );
 */
class Request
{
    /**
     * GET-Request Name
     * @var static
     */
    public static $GET = 'GET';

    /**
     * POST-Request Name
     * @var static
     */
    public static $POST = 'POST';

    /**
     * Request Variablen-Wert zurückgeben
     *
     * @param string        $a_name     Name des Parameters
     * @param string|null   $a_default  Default-Wert, falls nicht vorhadnen
     * @param string        $a_request  Request(GET oder POST)
     *
     * @return mixed
     */
    public function getVar( $a_name, $a_default = null, $a_request = 'GET' )
    {
        if ( $a_request == self::$GET )
        {
            $requestArray = $_GET;
        }
        else if ( $a_request == self::$POST )
        {
            $requestArray = $_POST;
        }
        else
        {
            $requestArray = array();
        }

        # Wert im Request vorhanden
        if ( isset( $requestArray[$a_name] ) )
        {
            return htmlspecialchars( $requestArray[$a_name] );
        }

        return $a_default;

    } # function getVar(...)

} # class