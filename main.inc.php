<?php
/**
 * Main file load's all the important files and the autoloader.
 * Bindet alles ein und setzt einige Variablen sowie die Datenbank.
 */
require_once __DIR__ . '/classes/Autoloader.class.inc.php';
require_once __DIR__ . '/config.inc.php';

# Registering autoloader
Autoloader::register();

try
{
    $host = MYSQL_HOST;
    $dbname = MYSQL_DB;

    # Creates a mysql connection
    $pdo = new PDO( "mysql:host={$host};dbname={$dbname}", MYSQL_USER, MYSQL_PASS, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );

    # Set DB connection
    Database::setConnection( $pdo );
}


catch ( Exception $e )
{
    # Error occured, please replace it with error template
    die( 'An internal error occured while proccessing your request' );
}
