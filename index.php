<?php
/**
 * Included die Main inc
 * Index Datei
 */

require_once( __DIR__ . '/main.inc.php' );

try
{
    # Request initialisieren
    $request = new Request();

    $controller = Factory::getController( $request );
    $action = Factory::getAction( $controller, $request );

    # Controller aufrufen
    echo $controller->$action();

}
catch ( Exception $e )
{
    # todo Fehler Template ersetzen
}
