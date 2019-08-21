<?php

/**
 * Class Factory
 * Diese Klasse holt sich den Kontroller und die Aktion
 * Der User sendet die Aufforderung, die Factory Klasse kümmert sich um die Ausführung
 */
class factory
{
    /**
     * Gibt den Controller zurück
     *
     * @param request $a_request    Request
     *
     * @return mixed
     */
    public static function getController( request $a_request )
    {
        # Name des Controllers
	    $controller_name = mb_strtolower( $a_request->getVar( 'controller' ) );
        $controller_name = ucfirst( $controller_name );
        $controller_name .= "Controller";

        if ( $controller_name == "Controller" )
        {
            $controller = new StartController();

            return $controller;
        }

        # Controller existiert nicht
        if ( !file_exists( __DIR__ . '/../controller/' . $controller_name . '.class.inc.php' ) )
        {
            return new DefaultController();
        }

        # Controller initialisieren
        $controller = new $controller_name();

        return $controller;

    } # function getController(...)

    /**
     * Gibt die Action zurück, auf der gearbeitet werden soll
     * @param DefaultController $a_controller   Ist der Default Controller
     * @param Request $a_request    Die Anfrage
     * @return string
     */
    public static function getAction( DefaultController $a_controller, Request $a_request )
    {
        # Name der Action
        $action_name = mb_strtolower( $a_request->getVar( "action" ) );
        $action_name = str_ireplace( 'action', '', $action_name );
        $action_name .= 'Action';

        # Action nicht da
        if ( !method_exists( $a_controller, $action_name ) )
        {
            return 'indexAction';
        }
        return $action_name;

    } # function getAction(...)

} # class
