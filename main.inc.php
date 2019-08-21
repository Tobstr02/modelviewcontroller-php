<?php
/**
 * Fügt den Autoloader und die Config hinzu
 * Bindet alles ein und setzt einige Variablen sowie die Datenbank.
 */
require_once __DIR__ . '/classes/autoloader.class.inc.php';
require_once __DIR__ . '/config.inc.php';

# Autoloader registrieren
autoloader::register();

try
{
    $host = MYSQL_HOST;
    $dbname = MYSQL_DB;

    # Stellt die MySQL Verbindung her
    $pdo = new PDO( "mysql:host={$host};dbname={$dbname}", MYSQL_USER, MYSQL_PASS, array( PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ) );

    # DB Verbindung setzen
    Database::setConnection( $pdo );
}


catch ( Exception $e )
{
    # Kritischer Fehler, sofortiger Abbruch
    die( '500' );
    exit();
}
