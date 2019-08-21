<?php

/**
 * Class database
 * Diese Klasse dient dazu, damit die Datenbankverbindung immer nur einmal hergestellt werden muss und über ein Objekt ansteuerbar ist.
 */
class database
{

    /**
     * @var PDO
     */
    private static $pdo = null;

    /**
     * @param PDO $a_pdo Pdo Instanz
     *
     * @return void
     */
    public static function setConnection( PDO $a_pdo )
    {
        self::$pdo = $a_pdo;
        return void;

    } # function setConnection(...)

    /**
     * @return PDO
     */
    public static function getConnection()
    {
        return self::$pdo;

    } # function getConnection()

} # class