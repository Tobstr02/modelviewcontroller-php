<?php

/**
 * Class Factory
 * This class returns the action and controller for index file
 */
class Factory
{
    /**
     * Returns the right controller
     *
     * @param Request $a_request    Request
     *
     * @return mixed
     */
    public static function getController( Request $a_request )
    {
        # Prepare name of controller
	    $controller_name = mb_strtolower( $a_request->getVar( 'controller' ) );
        $controller_name = ucfirst( $controller_name );
        $controller_name .= 'Controller';

        if ( $controller_name === 'Controller')
        {
            $controller = new DefaultController();

            return $controller;
        }

        # if controller doesn't exist
        if ( !file_exists( __DIR__ . '/../controller/' . $controller_name . '.class.inc.php' ) )
        {
            return new DefaultController();
        }

        # Call controller and returns it
        $controller = new $controller_name();

        return $controller;

    } # function getController(...)

    /**
     * Returns the right action
     * @param $a_controller
     * @param Request $a_request    Request
     * @return string
     */
    public static function getAction( $a_controller, Request $a_request )
    {
        # Prepare name of the action
        $action_name = mb_strtolower( $a_request->getVar('action') );
        $action_name = str_ireplace( 'action', '', $action_name );
        $action_name .= 'Action';

        # Action not found
        if ( !method_exists( $a_controller, $action_name ) )
        {
            return 'indexAction';
        }
        return $action_name;

    } # function getAction(...)

} # class
