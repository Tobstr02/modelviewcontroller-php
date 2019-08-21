<?php
/**
 * Includes the main inc
 * This is the index file.
 */
require_once __DIR__ . '/main.inc.php';

try
{
    # Initiliaze Request
    $request = new Request();

    # Get Controller from Factory
    $controller = Factory::getController( $request );
    # Get Action from Factory
    $action = Factory::getAction( $controller, $request );

    # Call controller and action
    echo $controller->$action();

}
catch ( Exception $e )
{
    # Please replace it with error template
    die( 'An internal error occured while processing your request.' );
}
